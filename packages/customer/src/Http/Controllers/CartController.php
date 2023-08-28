<?php

namespace QH\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Customer\Http\Services\CartService;
use QH\Customer\Repositories\Interfaces\CartRepositoryInterface;
use QH\Product\Http\Requests\Sale\SaleRequest;
use QH\Product\Repositories\Category\Interface\CategoryRepositoryInterface;

class CartController extends Controller
{
    protected $cartService;
    protected $categoryRepo;
    protected $cartRepo;

    public function __construct(CartService $cartService, CategoryRepositoryInterface $categoryRepo, CartRepositoryInterface $cartRepo)
    {
        $this->cartService = $cartService;
        $this->categoryRepo = $categoryRepo;
        $this->cartRepo = $cartRepo;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $customer = [];
        $products = $this->cartService->getProduct();
        if(Auth::guard('web')->check()){
            $customer =  $this->cartRepo->getInfoCustomer();
        }
        return view('user.cart', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'customer' => $customer,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(SaleRequest $request)
    {
        try {
            $result = $this->cartRepo->storeSale($request);
            if($result === true){
                return view('user.thankyou', [
                    'title' => 'Thank you',
                ]);
            }else{

            }
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return redirect()->back();
        }
        return redirect()->back();
    }
}
