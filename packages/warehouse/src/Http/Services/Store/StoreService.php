<?php

namespace QH\Warehouse\Http\Services\Store;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use QH\Product\Models\Product\Product;

class StoreService
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
        $import = Session::get('importStore');

        if (is_null($import)) {
            Session::put('importStore', [
                $product_id => $qty,
            ]);
            return true;
        }
        $exists = Arr::exists($import, $product_id);
        if ($exists) {
            $import[$product_id] += $qty;
            Session::put('importStore', $import);
            return true;
        }

        $import[$product_id] = $qty;
        Session::put('importStore', $import);

        return true;
    }
    public function update($request)
    {
        Session::put('importStore', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $import = Session::get('importStore');
        unset($import[$id]);

        Session::put('importStore', $import);
        return true;
    }
}
