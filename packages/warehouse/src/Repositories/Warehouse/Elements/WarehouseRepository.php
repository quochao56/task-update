<?php

namespace QH\Warehouse\Repositories\Warehouse\Elements;

use QH\Core\Base\Repository\BaseRepository;
use QH\Product\Models\Product\Product;
use QH\Warehouse\Models\ProductWarehouse;
use QH\Warehouse\Models\Warehouse;
use QH\Warehouse\Repositories\Warehouse\Interfaces\WarehouseRepositoryInterface;


class WarehouseRepository extends BaseRepository implements WarehouseRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Warehouse::class;
    }

    public function getProductsInWarehouse($warehouseId)
    {
        return Product::with('category')->whereHas('productWarehouses', function ($query) use ($warehouseId) {
            $query->where('warehouse_id', $warehouseId);
        })->with(['productWarehouses' => function ($query) use ($warehouseId) {
            $query->where('warehouse_id', $warehouseId);
        }])->paginate(3);
    }




}
