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
    public function storeStore($request)
    {
        try {
            DB::beginTransaction();

            $items = Session::get('importStore');

            if (is_null($items)) {
                return false;
            }

            $productId = array_keys($items);

            $productInWHs = ProductWarehouse::with('warehouse')
                ->whereIn('product_id', $productId)
                ->get();
            $dataProductStore = [];
            foreach ($productInWHs as $product) {
                $qty = $items[$product->product_id];
                $newQtyProduct = $product->qty - $qty;

                $product->update(['qty' => $newQtyProduct]);

                $productStore = ProductStore::with('store')
                    ->with('product')
                    ->where("product_id", $product->product_id)
                    ->first();
                if($productStore){
                    $dataProductStore[] = [
                        'id' => $productStore->id,
                        'store_id' => $request->input('storeId'),
                        'product_id' => $product->product_id,
                        'qty' => $productStore->qty + $qty
                    ];

                }
            }


            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('importStore');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

}
