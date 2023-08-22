<?php

namespace QH\Warehouse\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Warehouse\Http\Services\Store\StoreService;
use QH\Warehouse\Repositories\Store\Interfaces\StoreRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;

class StoreController extends Controller
{
    protected $storeService;
    protected $storeRepo;
    protected $warehouseRepo;

    public function __construct(WarehouseRepositoryInterface $warehouseRepository, StoreService $storeService, StoreRepositoryInterface $storeRepository)
    {
        $this->storeService = $storeService;
        $this->storeRepo = $storeRepository;
        $this->warehouseRepo = $warehouseRepository;
    }

    public function index(Request $request)
    {

        $warehouseId = $request->input('warehouse', '1');
        $storeId = $request->input('store', '1');

        $products_selected = $this->storeRepo->getProduct();

        return view('admin.warehouse.store.index', [
            'title' => 'Danh sánh sản phẩm',
            'warehouses' => $this->warehouseRepo->getActive(),
            'stores' => $this->storeRepo->getActive(),
            'products' => $this->warehouseRepo->getProductsInWarehouse($warehouseId),
            'products_selected' => $products_selected,
            'importStore' => Session::get('importStore'),
            'storeId' => $storeId
        ]);
    }


    public function create(Request $request)
    {
        $this->storeService->create($request);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->storeService->update($request);

        return redirect()->back();
    }

    public function destroy($id = 0)
    {
        $this->storeService->remove($id);

        return redirect()->back();
    }
    public function store(Request $request){
        $this->storeRepo->storeStore($request);

        return redirect()->back();
    }

    public function list()
    {

    }

    public function detail()
    {

    }

}
