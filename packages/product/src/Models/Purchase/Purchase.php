<?php

namespace QH\Product\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_qty',
        'shipping_cost',
        'total_amount',
        'note',
        'purchase_date'
    ];
    public function purchaseProducts(){
        return $this->hasMany(PurchaseProduct::class);
    }
}
