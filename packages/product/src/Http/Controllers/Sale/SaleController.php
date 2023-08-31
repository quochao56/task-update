<?php

namespace QH\Product\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use QH\Customer\Repositories\Interfaces\CartRepositoryInterface;
use QH\Product\Http\Requests\Sale\SaleRequest;
use QH\Product\Http\Services\Sale\SaleService;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;
use Ramsey\Uuid\Rfc4122\Validator;

class SaleController extends Controller
{
    protected $saleRepo;
    protected $warehouseRepo;

    public function __construct(SaleRepositoryInterface $saleRepo, WarehouseRepositoryInterface $warehouseRepository)
    {
        $this->saleRepo = $saleRepo;
        $this->warehouseRepo = $warehouseRepository;
    }

    public function index()
    {
        $products = $this->saleRepo->getActiveProducts();
        return view('admin.sale.index', [
            'title' => 'Danh sánh sản phẩm',
            'products' => $products,
            'warehouses' => $this->warehouseRepo->getActive(),
        ]);
    }

    public function store(SaleRequest $request)
    {
        $checkCustomer = $this->saleRepo->checkCustomer($request);

        if($checkCustomer){
            $selectedProducts = session('selectedProducts');
            if($checkCustomer == "phone"){
                return redirect()->back()->withErrors(['phone' => 'Số điện thoại này đã có người sử dụng'])->withInput()->with('selectedProducts', $selectedProducts);
            } elseif($checkCustomer == "email"){
                return redirect()->back()->withErrors(['email' => 'Email này đã có người sử dụng'])->withInput()->with('selectedProducts', $selectedProducts);
            }
        }
            $productIds[] = $request->input('product_id');
            dd($request->input('product_id') );
            if ($productIds == null) {
                Session()->flash('error', "Vui lòng chọn sản phẩm");
                return redirect()->back()->withInput();
            }


//        $this->saleRepo->storeSale($request);
        // Clear the selected product information from the session after a successful sale
        session()->forget('selectedProducts');

        return redirect()->back();
    }

    public function list()
    {
        $sales = $this->saleRepo->getAllSales();
        return view('admin.sale.list', [
            'title' => 'Danh sánh xuất hàng',
            'sales' => $sales
        ]);
    }

    public function detail($id)
    {
        $sales = $this->saleRepo->getSaleProduct($id);
        $customer = $this->saleRepo->getCustomerSale($id);
        return view('admin.sale.detail', [
            'title' => 'Chi tiết xuất hàng',
            'sales' => $sales,
            'customer' => $customer,
        ]);
    }
}
