<?php

namespace QH\Product\Repositories\Sale\Element;

use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use QH\Core\Base\Repository\BaseRepository;
use QH\Customer\Models\Customer;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Sale\Sale;
use QH\Product\Models\Sale\SaleProduct;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;


class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Sale::class;
    }

    public function getSaleProduct($id)
    {
        return SaleProduct::where('sale_id', $id)->get();
    }

    public function getAllSales(){
        return $this->model->with('customer')->orderByDesc('created_at')->paginate(5);
    }
    public function getCustomerSale($id){
        return SaleProduct::with('sale.customer')
            ->with('product')
            ->with('customer')
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
            $sale_id = $sale->id;
            $this->infoSaleProduct($items, $sale_id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('export');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

    protected function infoSaleProduct($items, $sale_id )
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
            $newQtyProduct = $product->qty - $qty;
            $product->update(['qty' => $newQtyProduct]);
            $data[] = [
                'sale_id' => $sale_id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
            ];

        }

        return SaleProduct::insert($data);
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
