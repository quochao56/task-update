<?php

namespace QH\Warehouse\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use QH\Product\Models\Product\Product;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Warehouse\Http\Requests\StoreRequest;
use QH\Warehouse\Http\Services\Store\StoreService;
use QH\Warehouse\Models\Store;
use QH\Warehouse\Repositories\Store\Interfaces\StoreRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;

class StoreController extends Controller
{
    protected $storeService;
    protected $warehouseRepo;
    protected $storeRepo;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository,WarehouseRepositoryInterface $warehouseRepository, StoreService $storeService, StoreRepositoryInterface $storeRepository)
    {
        $this->storeRepo = $storeRepository;
        $this->storeService = $storeService;
        $this->warehouseRepo = $warehouseRepository;
        $this->productRepository = $productRepository;
    }

    public function list(Request $request)
    {
        return view('admin.warehouse.store.list', [
            'title' => 'Danh sánh sản phẩm',
            'warehouses' => $this->warehouseRepo->getAllA(),
            'stores' => $this->storeRepo->getAll(),
            'total' => $this->productRepository->getTotal(),

        ]);
    }


    public function fetchProducts(Request $request)
    {
        $warehouseId = $request->input('warehouse');
        $productsData = $this->warehouseRepo->getProductsInWarehouse($warehouseId);

        return response()->json([
            'products' => $productsData['products'],
            'totalWQuantity' => $productsData['totalWQuantity'], // Include totalQuantity in the JSON response
        ]);
    }



    public function index()
    {
        $title = 'Danh sánh cửa hàng';
        $stores = $this->storeRepo->getAll();
        return view('admin.warehouse.store.index', compact(
            'title',
            'stores'
        ));
    }

    public function create()
    {
        return view('admin.warehouse.store.add', ['title' => 'Thêm cửa hàng mới']);
    }

    public function show($id)
    {
        $title = 'Sửa cửa hàng';
        $store = $this->storeRepo->find($id);

        return view('admin.warehouse.store.edit', compact(
            'title',
            'store'
        ));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        try {
            $this->storeRepo->create($data);
            session()->flash('success', 'Thêm cửa hàng Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.stores.index");
    }

    public function update(StoreRequest $request, Store $warehouse)
    {
        $data = $request->except('_token');
        try {
            $this->storeRepo->update($warehouse, $data);
            session()->flash('success', 'Sửa cửa hàng Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route("admin.stores.index");
    }

    public function destroy(Store $stores)
    {
        try {
            $this->storeRepo->delete($stores);
            session()->flash('success', 'Xóa cửa hàng Thành Công');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return false;
        }

        return redirect()->route("admin.stores.index");
    }

}
