<?php
namespace QH\Product\Http\Services\Sale;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use QH\Product\Models\Product\Product;

class SaleService
{
    public function create($request)
{
    // take two data quantity and product id to insert to session export
    $qty = (int) $request->input('num_product');
    $product_id = (int) $request->input('product_id');
    if ($qty <= 0 || $product_id <= 0) {
        Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
        return false;
    }
    $export = Session::get('export');

    if (is_null($export)) {
        Session::put('export', [
            $product_id => $qty,
        ]);
        return true;
    }
    $exists = Arr::exists($export , $product_id);
    if ($exists) {
        $export[$product_id] += $qty;
        Session::put('export', $export );
        return true;
    }

    $export[$product_id] = $qty;
    Session::put('export', $export );

    return true;
}

    public function update($request)
    {
        Session::put('export', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $export  = Session::get('export');
        unset($export[$id]);

        Session::put('export', $export );
        return true;
    }
}
