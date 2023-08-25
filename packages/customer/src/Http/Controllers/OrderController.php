<?php

namespace QH\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use QH\Customer\Repositories\Interfaces\OrderRepositoryInterface;
use QH\Product\Models\Sale\Sale;

class OrderController extends Controller
{
    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function index(){
        return view('user.order',[
            'title' => "Đơn hàng",
            'orders' => $this->orderRepo->getAllOrders()
        ]);
    }
    public function detail(Sale $sale){
        return view('user.order-detail',[
            'title' => "Chi tiêt đơn hàng",
            'orders' => $this->orderRepo->getSaleProduct($sale->id)
        ]);
    }
}
