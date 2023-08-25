<?php

namespace QH\Product\Repositories\Sale\Element;

use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Core\Base\Repository\BaseRepository;
use QH\Customer\Jobs\SendMail;
use QH\Customer\Models\Customer;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Sale\Sale;
use QH\Product\Models\Sale\SaleProduct;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;
use QH\Warehouse\Models\History\History;


class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Sale::class;
    }

    public function getSaleProduct($id)
    {
        return SaleProduct::with('product')->where('sale_id', $id)->get();
    }
    public function getActiveProducts()
    {
        return Product::with("category")->with("user")->where('status','active')->orderByDesc("id")->paginate(5);
    }

    public function getAllSales(){
        return $this->model->with('customer')->orderByDesc('created_at')->paginate(5);
    }
    public function getCustomerSale($id){
        return SaleProduct::with('sale.customer')
            ->with('product')
            ->where('sale_id', $id)
            ->first()
            ->sale
            ->customer;

    }

    public function storeSale($request)
    {
        $sale_date = Carbon::now("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
        try {
            DB::beginTransaction();

            $items = Session::get('export');

            if (is_null($items)) {
                Session::flash("error","Không có món hàng nào");
                return false;
            }
//          store customer
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $customer = Customer::where('email',$email)
                                ->where('phone', $phone)
                                ->first();

            if($customer){
                $customer->update([
                    'name' => $name,
                    'address' => $address
                ]);
            }else{
                $customer = Customer::create([
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                ]);
                if(Customer::where('phone',$customer->phone)->first()->id != $customer->id){
                    return redirect()->back()->withErrors(['phone' => 'Số điện thoại này đã có người sử dụng'])->withInput();
                }
                elseif(Customer::where('email',$customer->email)->first()->id != $customer->id){
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
            if ($this->infoSaleProduct($items, $sale, $email) == false) {
                return false;
            }

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            #Queue
            SendMail::dispatch($sale)->delay(now()->addSeconds(2));

            Session::forget('export');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

    protected function infoSaleProduct($items, $sale, $email)
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
        $dataProuductHistory = '';
        $qtyHistory = 0;
        foreach ($products as $product) {
            $qty = $items[$product->id];
            $qtyHistory += $qty;
            $price = $product->price;
            $total_amount = $qty * $price;
            $newQtyProduct = $product->qty - $qty;

            // Find the corresponding row in the joinResult for the product
            $warehouseRow = $joinResult->where('product_id', $product->id)->first();
            $newQtyWarehouse = $warehouseRow->qty - $qty;

            // Update the product's qty attribute
            $product->update(['qty' => $newQtyProduct]);

            $dataProuductHistory .= (string)$product->id . ',';

            // Prepare data for SaleProduct insertion
            $data[] = [
                'sale_id' => $sale->id,
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

        try {
// Insert the data into the SaleProduct table
            SaleProduct::insert($data);
            $dataProuductHistory = substr($dataProuductHistory, 0, -1);

            $history = new History();
            $history->from = 'w opsgreat 2';
            $history->to = $email;
            $history->qty = $qtyHistory;
            $history->total_amount = $total_amount;
            $history->product = $dataProuductHistory;
            $history->status = 'pending';
            $history->links = "http://task-update.test/admin/sale/detail/" . $sale->id;

            $history->save();

        } catch (\Exception $err) {
            DB::rollBack();
            return false;
        }

        return true;
    }

    public function getProduct()
    {
        $export  = Session::get('export');
        if (is_null($export )) {
            return [];
        }

        $productId = array_keys($export );
        return Product::select('id', 'name', 'price', 'thumb','qty')
            ->whereIn('id', $productId)
            ->get();
    }

}
