<?php

namespace QH\Product\Repositories\Purchase\Element;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Core\Base\Repository\BaseRepository;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Purchase\Purchase;
use QH\Product\Models\Purchase\PurchaseProduct;
use QH\Product\Repositories\Purchase\Interface\PurchaseRepositoryInterface;


class PurchaseRepository extends BaseRepository implements PurchaseRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Purchase::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(2)->get();
    }

    public function getPurchaseProduct($id)
    {
        return PurchaseProduct::where('purchase_id', $id)->get();
    }

    public function getActiveProducts()
    {
        return Product::with("category")->with("user")->where('status','active')->orderByDesc("id")->paginate(3);
    }
    public function getAllPurchases(){
        return Purchase::orderByDesc('created_at')->paginate(5);
    }

    public function storePurchase($request)
    {
        $purchase_date = Carbon::now("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
        try {
            DB::beginTransaction();

            $items = Session::get('import');

            if (is_null($items)) {
                return false;
            }
            // dd(,$request->input('total_amount'),$request->input('note'),$purchase_date);

            $purchase = new Purchase();
            $purchase->total_qty = $request->input('qty');
            $purchase->total_amount = $request->input('total_amount');
            $purchase->note = $request->input('note');
            $purchase->purchase_date = $purchase_date;
            $purchase->save();
            $purchase_id = $purchase->id;
            $this->infoPurchaseProduct($items, $purchase_id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('import');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

    protected function infoPurchaseProduct($items, $purchase_id )
    {
        $productId = array_keys($items);
        $products = Product::select('id', 'qty','price')
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $qty = $items[$product->id];
            $price = $product->price;
            $total_amount = $qty * $price;
            $newQtyProduct = $product->qty + $qty;
            $product->update(['qty' => $newQtyProduct]);
            $data[] = [
                'purchase_id' => $purchase_id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
            ];

        }

        return PurchaseProduct::insert($data);
    }
}
