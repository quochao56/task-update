<?php

namespace QH\Product\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Warehouse\Models\Warehouse;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_qty',
        'shipping_cost',
        'total_amount',
        'note',
        'warehouse_id',
        'purchase_date'
    ];
    public function purchaseProducts(){
        return $this->hasMany(PurchaseProduct::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
