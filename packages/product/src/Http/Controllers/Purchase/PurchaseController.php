<?php

namespace QH\Product\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use QH\Product\Http\Services\Purchase\PurchaseService;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Product\Repositories\Purchase\Interface\PurchaseRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;


class PurchaseController extends Controller
{
    protected $purchaseRepo;
    protected $warehouseRepo;

    public function __construct(PurchaseRepositoryInterface $purchaseRepo, WarehouseRepositoryInterface $warehouseRepo)
    {
        $this->purchaseRepo = $purchaseRepo;
        $this->warehouseRepo = $warehouseRepo;
    }
    public function index(){
        $products = $this->purchaseRepo->getActiveProducts();
        return view('admin.purchase.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
            'warehouses' => $this->warehouseRepo->getActive()
        ]);
    }

    public function store(Request $request){
        $this->purchaseRepo->storePurchase($request);

        return redirect()->back();
    }

    public function list(){
        $purchases = $this->purchaseRepo->getAllPurchases();
        return view('admin.purchase.list', [
            'title' => 'Danh sánh nhập hàng',
            'purchases' => $purchases
        ]);
    }

    public function detail($id){
        $purchases = $this->purchaseRepo->getPurchaseProduct($id);
        return view('admin.purchase.detail', [
            'title' => 'Chi tiết nhập hàng',
            'purchases' => $purchases,
        ]);
    }

}
