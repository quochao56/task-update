<?php

namespace QH\Customer\Repositories\Elements;

use Illuminate\Support\Facades\Auth;
use QH\Core\Base\Repository\BaseRepository;
use QH\Customer\Repositories\Interfaces\OrderRepositoryInterface;
use QH\Product\Models\Sale\Sale;
use QH\Product\Models\Sale\SaleProduct;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Sale::class;
    }
    public function getAllOrders(){

        $userEmail = Auth::guard('web')->user()->email;

        return $this->model->with('customer')
            ->whereHas('customer', function ($query) use ($userEmail) {
                $query->where('email', $userEmail);
            })
            ->orderByDesc('created_at')
            ->paginate(5);

    }

    public function getSaleProduct($id)
    {
        return SaleProduct::with('product')->where('sale_id', $id)->get();
    }
}
