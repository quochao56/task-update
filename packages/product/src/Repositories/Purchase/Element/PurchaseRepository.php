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
use QH\Warehouse\Models\History\History;
use QH\Warehouse\Models\ProductWarehouse;
use QH\Warehouse\Models\Warehouse;


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
        return PurchaseProduct::with('product')->where('purchase_id', $id)->get();
    }

    public function getActiveProducts()
    {
        return Product::with("category")->with("user")->where('status', 'active')->orderByDesc("id")->paginate(5);
    }

    public function getAllPurchases()
    {
        return Purchase::orderByDesc('created_at')->paginate(10);
    }

    public function getAllWarehouses()
    {
        return Warehouse::with('purchases')->where('status', 'active')->get();
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
            $selectedWarehouses = $request->input('warehouse_id', []);
            foreach ($selectedWarehouses as $warehouseId) {
                $purchase = new Purchase();
                $purchase->total_qty = $request->input('qty');
                $purchase->total_amount = $request->input('total_amount');
                $purchase->note = $request->input('note');
                $purchase->purchase_date = $purchase_date;
                $purchase->warehouse_id = $warehouseId;
                $purchase->save();
                $warehouseName = $purchase->warehouse->name;
                if ($this->insertPPnWP($items, $purchase, $warehouseName) == false) {
                    return false;
                }
            }

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            Session::forget('import');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
        return true;
    }

    protected function insertPPnWP($items, $purchase, $warehouseName)
    {
        $productId = array_keys($items);
        $products = Product::with('productWarehouses')
            ->whereIn('id', $productId)
            ->get();
        $dataPurchase = [];
        $dataWarehouse = [];
        $dataProuductHistory = '';
        $qtyHistory = 0;
        foreach ($products as $product) {
            $qty = $items[$product->id];
            $qtyHistory += $qty;
            $price = $product->price;
            $total_amount = $qty * $price;
            $newQtyProduct = $product->qty + $qty;

            // Update the Product record
            $product->update(['qty' => $newQtyProduct]);

            $dataPurchase[] = [
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
            ];
            $dataProuductHistory .= (string)$product->id . ',';
            // Check if a ProductWarehouse record exists
            $productWarehouse = $product->productWarehouses->where('warehouse_id', $purchase->warehouse_id)->first();

            if ($productWarehouse) {
                // If it exists, update it
                $dataWarehouse[] = [
                    'id' => $productWarehouse->id,
                    'product_id' => $product->id,
                    'warehouse_id' => $purchase->warehouse_id,
                    'qty' => $productWarehouse->qty + $qty
                ];
            } else {
                // If the product doesn't exist, create a new record
                $pw = ProductWarehouse::create([
                    'product_id' => $product->id,
                    'warehouse_id' => $purchase->warehouse_id,
                    'qty' => $qty,
                ]);
            }
        }

        try {
            try {
                ProductWarehouse::upsert($dataWarehouse, ['id'], ['qty']); // Use upsert to insert or update based on id
            } catch (\Exception $err) {
                \Log::error('Error message: ' . $err->getMessage());
                return false;
            }

            PurchaseProduct::insert($dataPurchase);
            $dataProuductHistory = substr($dataProuductHistory, 0, -1);
//            $status = Purchase::find($purchase->id)->status;

            $history = new History();
            $history->from = 'NCC';
            $history->to = $warehouseName;
            $history->qty = $qtyHistory;
            $history->total_amount = $total_amount;
            $history->product = $dataProuductHistory;
            $history->status = 'pending';
            $history->links = "http://task-update.test/admin/orders/detail/" . $purchase->id;

            $history->save();

        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;


    }
}
