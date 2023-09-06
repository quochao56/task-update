<?php

namespace QH\Product\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QH\Product\Http\Requests\Product\CreateProductRequest;
use QH\Product\Http\Requests\Product\UpdateProductRequest;
use QH\Product\Http\Services\Product\UploadService;
use QH\Product\Http\Services\Service;
use QH\Product\Models\Product\Product;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepo;
    protected $uploadService;
    protected $categoryRepository;
    protected $warehouseRepository;

    public $service;

    public function __construct(WarehouseRepositoryInterface $warehouseRepository,ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepository, UploadService $uploadService, Service $service)
    {
        $this->service = $service;
        $this->productRepo = $productRepo;
        $this->uploadService = $uploadService;
        $this->categoryRepository = $categoryRepository;
        $this->warehouseRepository = $warehouseRepository;

    }

    public function index()
    {
        $products = $this->productRepo->getAllProducts();

        return view('admin.product.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->getActive();
        $users = $this->productRepo->getAllUsers();
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm mới',
            'categories' => $categories,
            'users' => $users,
            'warehouses' => $this->warehouseRepository->getActive()
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        try {
            $request = $this->uploadService->uploadImage($request);
            $request = $this->uploadService->uploadImages($request);
            $data = $request;
            $data['slug'] = $this->service->createSlug($request->input('name'));
            $result = $this->productRepo->createProduct($data);
            if ($result) {
                session()->flash('success', 'Thêm Sản phẩm Thành Công');
            }
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.product.index");
    }

    public function show($id)
    {
        $categories = $this->categoryRepository->getActive();
        $users = $this->productRepo->getAllUsers();
        $product = $this->productRepo->find($id);

        return view('admin.product.edit', [
            'title' => 'Sửa sản phẩm',
            'product' => $product,
            'categories' => $categories,
            'users' => $users,
//            'warehouses' => $this->warehouseRepository->getActive()

        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request;
//        dd($data);

        if ($request->hasFile('file')) {
            $data = $this->uploadService->uploadImage($data); // Modify the data using your service
        } elseif(empty($request->hasFile('file'))) {
            unset($data['thumb']); // Remove the 'thumb' key from the data
        }

        if ($request->hasFile('images')) {
            $data = $this->uploadService->uploadImages($data);
        } elseif(empty($request->hasFile('images'))) {
            unset($data['thumbs']); // Remove the 'thumbs' key from the data
        }

        unset($data['_token']); // Remove the '_token' key from the data

        $data = $data->all(); // Verify the modified data
//        dd($data);
        try {
            $data['slug'] = $this->service->createSlug($request->input('name'));
            $this->productRepo->updateProduct($product, $data);
            session()->flash('success', 'Sửa Sản phẩm Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.product.index");
    }

    public function destroy(Product $product)
    {
        try {
            $result = $this->productRepo->deleteAndUnlinkImage($product);

            session()->flash('success', 'Xóa Sản phẩm Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.product.index");
    }
}
