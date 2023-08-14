<?php

namespace QH\Product\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use QH\Product\Http\Requests\Sale\SaleRequest;
use QH\Product\Http\Services\Sale\SaleService;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;
use Ramsey\Uuid\Rfc4122\Validator;

class SaleController extends Controller
{
    protected $productRepo;
    protected $saleService;
    protected $saleRepo;

    public function __construct(ProductRepositoryInterface $productRepo, SaleService $saleService, SaleRepositoryInterface $saleRepo)
    {
        $this->productRepo = $productRepo;
        $this->saleService = $saleService;
        $this->saleRepo = $saleRepo;
    }
    public function index(){
        $products = $this->productRepo->getAllProducts();
        $products_selected = $this->saleRepo->getProduct();
        return view('admin.sale.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
            'products_selected' =>$products_selected,
            'export' => Session::get('export')
        ]);
    }
    public function create(Request $request){
        $this->saleService->create($request);

        return redirect()->back();
    }


    public function update(Request $request)
    {
        $request->except("_token");
        $this->saleService->update($request);

        return redirect()->back();
    }

    public function store(SaleRequest $request){

        $this->saleRepo->storeSale($request);

        return redirect()->back();
    }
    public function destroy($id = 0)
    {
        $this->saleService->remove($id);

        return redirect()->back();
    }
    public function list(){
        $sales = $this->saleRepo->getAllSales();
        return view('admin.sale.list', [
            'title' => 'Danh sánh xuất hàng',
            'sales' => $sales
        ]);
    }

    public function detail($id){
        $sales = $this->saleRepo->getSaleProduct($id);
        $customer = $this->saleRepo->getCustomerSale($id);
        return view('admin.sale.detail', [
            'title' => 'Chi tiết xuất hàng',
            'sales' => $sales,
            'customer' => $customer,
        ]);
    }
}
