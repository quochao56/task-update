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
    private $dataProductHistory = '';

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
        return PurchaseProduct::with('product')->with('warehouse')->where('purchase_id', $id)->get();
    }

    public function getActiveProducts()
    {
        return Product::with("category")->with("user")->where('status', 'active')->orderByDesc("id")->get();
    }

    public function getAllPurchases()
    {
        return Purchase::orderByDesc('created_at')->paginate(10);
    }

    public function getAllWarehouses()
    {
        return Warehouse::where('status', 'active')->get();
    }

    public function storePurchase($request)
    {
        $purchase_date = Carbon::now("Asia/Ho_Chi_Minh")->format("Y-m-d H:i:s");
        try {
            DB::beginTransaction();
//            dd($request);
            $productIds[] = $request->input('product_id');
            $warehouseIds[] = $request->input('warehouse_id');
            $numberProducts[] = $request->input('num_product');
            $total_price = $request->input('total_end');
            $total_qty = $request->input('total_qty');
            $note = $request->input('note');

//            dd(sizeof($productIds[0]));
            $productsByWarehouse = [];
            if ($productIds[0] == null) {
                Session()->flash('error',"Vui lòng chọn sản phẩm");
                return redirect()->back();
            } else {

                for ($i = 0; $i < sizeof($productIds[0]); $i++) {
                    $warehouseId = $warehouseIds[0][$i];
                    $product_id = $productIds[0][$i];
                    $qty = $numberProducts[0][$i];

                    if (!isset($productsByWarehouse[$warehouseId])) {
                        $productsByWarehouse[$warehouseId] = [];
                    }

                    if (isset($productsByWarehouse[$warehouseId][$product_id])) {
                        // If the product_id already exists in the warehouse, add the quantity
                        $productsByWarehouse[$warehouseId][$product_id] += $qty;
                    } else {
                        // If the product_id doesn't exist in the warehouse, set the quantity
                        $productsByWarehouse[$warehouseId][$product_id] = $qty;
                    }
                }
            }

            $warehouses = implode(", ", array_unique($warehouseIds[0]));
//dd($warehouses);
            $purchase = Purchase::create([
                "total_qty" => $total_qty,
                "total_amount" => $total_price,
                "note" => $note,
                "purchase_date" => $purchase_date,
                "warehouse" => $warehouses
            ]);

            $warehouseIds = explode(', ', $purchase->warehouse);
            foreach ($warehouseIds as $warehouseId) {
                $products = $productsByWarehouse[$warehouseId];
//            create purchase_product
                if ($this->insertPPnWP($products, $purchase, $warehouseId) == false) {
                    return false;
                }
            }
//            dd($purchase);
            //take warehouse's name to string
            $warehouseNames = Warehouse::whereIn('id', $warehouseIds)->pluck('name')->implode(', ');
//            dd($warehouseNames);

            //sort products
            $productIdsString = implode(", ", array_unique($productIds[0]));
            $explode = explode(", ", $productIdsString);
            sort($explode);
            $productIdsArray = implode(', ', $explode);
            // insert History
            $history = new History();
            $history->from = 'NCC';
            $history->to = $warehouseNames;
            $history->qty = $total_qty;
            $history->total_amount = $total_price;
            $history->product = $productIdsArray;
            $history->status = 'pending';
            $history->links = "http://task-update.test/admin/orders/detail/" . $purchase->id;

            $history->save();
//            dd($history);

            Session::flash('success', 'Đặt Hàng Thành Công');

            DB::commit();
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
        return true;
    }

    protected function insertPPnWP($productIds, $purchase, $warehouseId)
    {
//        dd($productIds);
        $products = Product::with('productWarehouses')
            ->whereIn('id', array_keys($productIds))
            ->select('id', 'name', 'qty', 'price')
            ->get();

//        dd($products);
        $dataPurchase = [];
        $dataWarehouse = [];
        foreach ($products as $product) {
            $qty = $productIds[$product->id];
            $price = $product->price;
            $newQtyProduct = $product->qty + $qty;
            $total_amount = $qty * $price;

//            dd($newQtyProduct, $price);

            // Update the Product record
            $product->update(['qty' => $newQtyProduct]);

            $dataPurchase[] = [
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'total_amount' => $total_amount,
                'warehouse_id' => $warehouseId,
            ];
//            dd($dataPurchase);
            // Check if a ProductWarehouse record exists
            $productWarehouse = $product->productWarehouses->where('warehouse_id', $warehouseId)->first();

//            dd($productWarehouse);
            if ($productWarehouse) {
                // If it exists, update it
                $dataWarehouse[] = [
                    'id' => $productWarehouse->id,
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouseId,
                    'qty' => $productWarehouse->qty + $qty
                ];
            } else {
                // If the product doesn't exist, create a new record
                $pw = ProductWarehouse::create([
                    'product_id' => $product->id,
                    'warehouse_id' => $warehouseId,
                    'qty' => $qty,
                ]);
//                dd($pw);
            }
        }
        try {
            ProductWarehouse::upsert($dataWarehouse, ['id'], ['qty']); // Use upsert to insert or update based on id
            PurchaseProduct::insert($dataPurchase);

        } catch (\Exception $err) {
            \Log::error('Error message: ' . $err->getMessage());
            return false;
        }
        return true;
    }
}
