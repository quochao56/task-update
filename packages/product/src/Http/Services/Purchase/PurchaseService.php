<?php
namespace QH\Product\Http\Services\Purchase;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use QH\Product\Models\Product\Product;

class PurchaseService
{
    public function create($request)
    {
        // take two data quantity and product id to insert to session import
        $qty = (int) $request->input('num_product');
        $product_id = (int) $request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }
        $import = Session::get('import');

        if (is_null($import)) {
            Session::put('import', [
                $product_id => $qty,
            ]);
            return true;
        }
        $exists = Arr::exists($import, $product_id);
        if ($exists) {
            $import[$product_id] += $qty;
            Session::put('import', $import);
            return true;
        }

        $import[$product_id] = $qty;
        Session::put('import', $import);

        return true;
    }
    public function getProduct()
    {
        $import = Session::get('import');
        if (is_null($import)) {
            return [];
        }

        $productId = array_keys($import);
        return Product::select('id', 'name', 'price', 'thumb')
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('import', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $import = Session::get('import');
        unset($import[$id]);

        Session::put('import', $import);
        return true;
    }
}
