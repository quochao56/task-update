<?php

namespace QH\Product\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use QH\Customer\Repositories\Interfaces\CartRepositoryInterface;
use QH\Product\Http\Requests\Sale\SaleRequest;
use QH\Product\Http\Services\Sale\SaleService;
use QH\Product\Models\Product\Product;
use QH\Product\Repositories\Product\Interface\ProductRepositoryInterface;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;
use Ramsey\Uuid\Rfc4122\Validator;

class SaleController extends Controller
{
    protected $saleRepo;
    protected $warehouseRepo;
    protected $productRepo;

    public function __construct(SaleRepositoryInterface $saleRepo, WarehouseRepositoryInterface $warehouseRepository, ProductRepositoryInterface $productRepository)
    {
        $this->saleRepo = $saleRepo;
        $this->warehouseRepo = $warehouseRepository;
        $this->productRepo = $productRepository;
    }

    public function index()
    {

        return view('admin.sale.index', [
            'title' => 'Danh sánh sản phẩm',
            'warehouses' => $this->warehouseRepo->getActive(),
        ]);
    }

    public function getProductsForWarehouse(Request $request, $warehouseId)
    {
        return $this->saleRepo->getProductsForWarehouse($request, $warehouseId);
    }

    public function checkCustomer(SaleRequest $request)
    {
        $checkCustomer = $this->saleRepo->checkCustomer($request);
//        dd($request->all());
        if ($checkCustomer) {
            if ($checkCustomer == 'phone')
                return redirect()->back()->withErrors(['phone' => 'Số điện thoại này đã có người sử dụng'])->withInput();
            elseif ($checkCustomer == 'email')
                return redirect()->back()->withErrors(['email' => 'Địa chỉ email này đã có người sử dụng'])->withInput();

            // Store customer data in the session
            session()->put('customer', $checkCustomer);

//            dd($checkCustomer);
            return redirect()->back()->withInput()->with([
                'alert' => 'Thông tin khách hàng hợp lệ và đã được lưu lại!',
                'customer' => $checkCustomer
            ]);
        }
    }

    public function store(Request $request)
    {
        if ($request->input('customer') == null) {
            return redirect()->back()->with('error', 'Vui lòng kiểm tra lại thông tin khách hàng');
        } else {
            $this->saleRepo->storeSale($request);
        }
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
