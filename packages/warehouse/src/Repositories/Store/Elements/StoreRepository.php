<?php

namespace QH\Warehouse\Repositories\Store\Elements;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Core\Base\Repository\BaseRepository;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Purchase\Purchase;
use QH\Product\Models\Purchase\PurchaseProduct;
use QH\Warehouse\Models\ProductStore;
use QH\Warehouse\Models\ProductWarehouse;
use QH\Warehouse\Models\Store;
use QH\Warehouse\Repositories\Store\Interfaces\StoreRepositoryInterface;


class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Store::class;
    }

    public function getProduct()
    {
        $importStore = Session::get('importStore');
        if (is_null($importStore)) {
            return [];
        }

        $productId = array_keys($importStore);
        return Product::with('productWarehouses')->select('id', 'name', 'price', 'thumb')
            ->whereIn('id', $productId)
            ->get();
    }

}
