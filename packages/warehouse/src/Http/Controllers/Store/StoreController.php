<?php

namespace QH\Warehouse\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    public function __construct(WarehouseRepositoryInterface $warehouseRepository, StoreService $storeService, StoreRepositoryInterface $storeRepository)
    {
        $this->storeRepo = $storeRepository;
        $this->storeService = $storeService;
        $this->warehouseRepo = $warehouseRepository;
    }
    function list(Request $request) {

        // Get the current query parameters, including warehouse and store
        $queryParameters = $request->query();

        $warehouseId = $request->input('warehouse', '1');
        $storeId = $request->input('store', '1');

        return view('admin.warehouse.store.list', [
            'title' => 'Danh sánh sản phẩm',
            'warehouses' => $this->warehouseRepo->getAll(),
            'stores' => $this->storeRepo->getAll(),
            'products' => $this->warehouseRepo->getProductsInWarehouse($warehouseId)->appends($queryParameters),
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
