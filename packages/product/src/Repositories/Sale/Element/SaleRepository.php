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
use QH\Product\Models\Purchase\Purchase;
use QH\Product\Models\Purchase\PurchaseProduct;
use QH\Product\Models\Sale\Sale;
use QH\Product\Models\Sale\SaleProduct;
use QH\Product\Repositories\Sale\Interface\SaleRepositoryInterface;
use QH\Warehouse\Models\History\History;
use QH\Warehouse\Models\ProductWarehouse;
use QH\Warehouse\Models\Warehouse;


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
        return Product::with("category")->with("user")->where('status', 'active')->orderByDesc("id")->paginate(5);
    }

    public function getAllSales()
    {
        return $this->model->with('customer')->orderByDesc('created_at')->get();
    }
    public function getAllSalesP()
    {
        return $this->model->with('customer')->orderByDesc('created_at')->paginate(15);
    }

    public function getCustomerSale($id)
    {
        return SaleProduct::with('sale.customer')
            ->with('product')
            ->where('sale_id', $id)
            ->first()
            ->sale
            ->customer;

    }

    public function getProductsForWarehouse($request, $warehouseId)
    {
        // Retrieve products filtered by warehouse ID
        $filteredProducts = Product::whereHas('productWarehouses', function ($query) use ($warehouseId) {
            $query->where('warehouse_id', $warehouseId);
        })->get();

        // Return the filtered products as JSON response
        return response()->json($filteredProducts);
    }

    public function checkCustomer($request)
    {
        try {
            DB::beginTransaction();

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
                    return 'phone';
                } elseif (Customer::where('email', $customer->email)->first()->id != $customer->id) {
                    return 'email';
                }
            }
            DB::commit();
            return $customer;
        } catch (\Exception $err) {
            DB::rollBack();
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
    }

    public function storeSale($request)
    {
        $sale_date = Carbon::now("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
        try {
            $productIds[] = $request->input('product_id');
//            $warehouseIds[] = $request->input('warehouse_id');
            $numberProducts[] = $request->input('num_product');
            $total_price = $request->input('total_end');
            $total_qty = $request->input('total_qty');
            $note = $request->input('note');
            $warehouse_id = $request->input('warehouse_id');
            // convert customer to array
            $customer = $request->input('customer');

//            dd($customer);
            $customerArray = json_decode($customer, true);
            // Check if the 'email' key exists in the array


//            dd($customerArray);
//            session()->put('customer', $customer);
            $validator = \Validator::make($request->all(), [
                'warehouse_id' => 'required',
            ],
                [
                    'warehouse_id' => "Vui lòng chọn kho"
                ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with([
                        'alert' => 'Thông tin khách hàng hợp lệ và đã được lưu lại!',
                        'customer' => $customer,
                        'customerArray' => $customerArray
                    ]);
            }
            if ($productIds[0] == null) {
                Session()->flash('error', "Vui lòng chọn sản phẩm");
                return redirect()->back()->withInput()->with([
                    'alert' => 'Thông tin khách hàng hợp lệ và đã được lưu lại!',
                    'customer' => $customer,
                    'customerArray' => $customerArray
                ]);
            } else {
                // Clean data productId => qty
                $products = [];

                for ($i = 0; $i < sizeof($productIds[0]); $i++) {
                    $product_id = $productIds[0][$i];
                    $qty = $numberProducts[0][$i];

                    if (isset($products[$product_id])) {
                        // If the product_id already exists in the array, add the quantity
                        $products[$product_id] += $qty;
                    } else {
                        // If the product_id doesn't exist in the array, set the quantity
                        $products[$product_id] = $qty;
                    }
                }

            }

            //  store Sale
            $sale = new Sale();
            $sale->customer_id = $customerArray['id'];
            $sale->total_qty = $total_qty;
            $sale->total_amount = $total_price;
            $sale->note = $note;
            $sale->sale_date = $sale_date;
            $sale->warehouse_id = $warehouse_id;
            $sale->save();
//            dd($sale);
            if ($this->infoSaleProduct($products, $sale) == false) {
                return false;
            }

            //sort products
            $productIdsString = implode(", ", array_unique($productIds[0]));
            $explode = explode(", ", $productIdsString);
            sort($explode);
            $productIdsArray = implode(', ', $explode);
            // insert History
            $history = new History();
            $history->from = $sale->warehouse->name;
            $history->to = $customerArray['email'];
            $history->qty = $total_qty;
            $history->total_amount = $total_price;
            $history->product = $productIdsArray;
            $history->status = 'pending';
            $history->links = "http://task-update.test/admin/sale/detail/" . $sale->id;

            $history->save();
            #Queue
            SendMail::dispatch($sale)->delay(now()->addSeconds(2));


            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('customer');
            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
        return true;
    }

    protected function infoSaleProduct($productIds, $sale)
    {
//        dd($productIds);
        $products = Product::with('productWarehouses')
            ->whereIn('id', array_keys($productIds))
            ->select('id', 'name', 'qty', 'price')
            ->get();
//        dd($products);


        $data = [];
        foreach ($products as $product) {
            $qty = $productIds[$product->id];
            $price = $product->price;
            $total_amount = $qty * $price;
            $newQtyProduct = $product->qty - $qty;
//            dd($qty, $price, $total_amount, $newQtyProduct);

            // Update the product's qty attribute
            $product->update(['qty' => $newQtyProduct]);
            // Update the product's qty in warehouse
            $productWarehouse = $product->productWarehouses
                ->where('warehouse_id', $sale->warehouse_id)
                ->first();

            if ($productWarehouse) {
                // Ensure $productWarehouse is not null
                $newQty = $productWarehouse->qty - $qty; // Subtract $qty from the current quantity

                // Update the qty column with the new quantity
                $productWarehouse->update(['qty' => $newQty]);

            } else {
                // Handle the case where the productWarehouse does not exist for the given warehouse
                \Log::error('ProductWarehouse not found for the specified warehouse.');
                return false;
            }

            // Prepare data for SaleProduct insertion
            $data[] = [
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
            ];
        }
        try {
            SaleProduct::insert($data);
        } catch (\Exception $err) {
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
        return true;
    }
    public function getProduct()
    {
        $export = Session::get('export');
        if (is_null($export)) {
            return [];
        }

        $productId = array_keys($export);
        return Product::select('id', 'name', 'price', 'thumb', 'qty')
            ->whereIn('id', $productId)
            ->get();
    }

}
