<?php

namespace QH\Product\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use QH\Product\Http\Services\Purchase\PurchaseService;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Product\Repositories\Purchase\Interface\PurchaseRepositoryInterface;


class PurchaseController extends Controller
{
    protected $purchaseService;
    protected $purchaseRepo;

    public function __construct(PurchaseService $purchaseService, PurchaseRepositoryInterface $purchaseRepo)
    {
        $this->purchaseService = $purchaseService;
        $this->purchaseRepo = $purchaseRepo;
    }
    public function index(){
        $products = $this->purchaseRepo->getActiveProducts();
        $products_selected = $this->purchaseService->getProduct();

        return view('admin.purchase.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
            'products_selected' =>$products_selected,
            'import' => Session::get('import'),
            'warehouses' => $this->purchaseRepo->getAllWarehouses()
        ]);
    }
    public function create(Request $request){
        $this->purchaseService->create($request);

        return redirect()->back();
    }


    public function update(Request $request)
    {
        $request->except("_token");
        $this->purchaseService->update($request);

        return redirect()->back();
    }

    public function store(Request $request){
        $request->only(['note','qty','total_amount','warehouse_id']);
        $this->purchaseRepo->storePurchase($request);

        return redirect()->back();
    }
    public function destroy($id = 0)
    {
        $this->purchaseService->remove($id);

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
