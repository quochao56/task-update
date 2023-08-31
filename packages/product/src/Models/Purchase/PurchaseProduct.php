<?php

namespace QH\Product\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;
use QH\Warehouse\Models\Warehouse;


class PurchaseProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'qty',
        'price',
        'total_amount',
        'warehouse_id'
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
