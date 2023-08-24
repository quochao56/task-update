<?php

namespace QH\Customer\Repositories\Elements;

use App\Jobs\SendMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Core\Base\Repository\BaseRepository;
use QH\Customer\Models\Customer;
use QH\Customer\Repositories\Interfaces\CartRepositoryInterface;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Sale\Sale;
use QH\Product\Models\Sale\SaleProduct;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function getModel()
    {
        return Sale::class;
    }

    public function storeSale($request)
    {
        $sale_date = Carbon::now("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
        try {
            DB::beginTransaction();

            $items = Session::get('carts');

            if (is_null($items)) {
                Session::flash("error", "Không có món hàng nào");
                return false;
            }
//          store customer
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $customer = Customer::where('email', $email)
                ->where('phone', $phone)
                ->first();

            if ($customer) {
                $customer->update([
                    'name' => $name,
                    'address' => $address
                ]);
            } else {
                $customer = Customer::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                ]);
                if (Customer::where('phone', $customer->phone)->first()->id != $customer->id) {
                    return redirect()->back()->withErrors(['phone' => 'Số điện thoại này đã có người sử dụng'])->withInput();
                } elseif (Customer::where('email', $customer->email)->first()->id != $customer->id) {
                    return redirect()->back()->withErrors(['email' => 'Email này đã có người sử dụng'])->withInput();
                }
            }
//            store Purchase
            $sale = new Sale();
            $sale->customer_id = $customer->id;
            $sale->total_qty = $request->input('qty');
            $sale->total_amount = $request->input('total_amount');
            $sale->note = $request->input('note');
            $sale->sale_date = $sale_date;
            $sale->save();
            $sale_id = $sale->id;
            $this->infoSaleProduct($items, $sale_id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
     
            #Queue
            SendMail::dispatch($sale)->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

    protected function infoSaleProduct($items, $sale_id)
    {
        $productId = array_keys($items);
        $products = Product::select('id', 'qty', 'price')
            ->whereIn('id', $productId)
            ->get();
        $joinResult = DB::table('warehouse_stores')
            ->join('product_warehouses', function ($join) {
                $join->on('warehouse_stores.warehouse_id', '=', 'product_warehouses.warehouse_id')
                    ->where('warehouse_stores.warehouse_id', '2'); // Default store 2
            })
            ->select('warehouse_stores.*', 'product_warehouses.*')
            ->get();

        $data = [];
        foreach ($products as $product) {
            $qty = $items[$product->id];
            $price = $product->price;
            $total_amount = $qty * $price;
            $newQtyProduct = $product->qty - $qty;

            // Find the corresponding row in the joinResult for the product
            $warehouseRow = $joinResult->where('product_id', $product->id)->first();
            $newQtyWarehouse = $warehouseRow->qty - $qty;

            // Update the product's qty attribute
            $product->update(['qty' => $newQtyProduct]);

            // Prepare data for SaleProduct insertion
            $data[] = [
                'sale_id' => $sale_id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
            ];
            // Update the warehouse quantity in the product_warehouses table
            DB::table('product_warehouses')
                ->where('warehouse_id', $warehouseRow->warehouse_id)
                ->where('product_id', $product->id)
                ->update(['qty' => $newQtyWarehouse]);
        }

// Insert the data into the SaleProduct table
        return SaleProduct::insert($data);
    }
}
