<?php

namespace QH\Product\Models\Sale;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Customer\Models\Customer;
use QH\Warehouse\Models\Warehouse;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_qty',
        'shipping_cost',
        'total_amount',
        'note',
        'purchase_date',
        'status',
        'customer_id',
        'warehouse_id'
    ];

    public function saleProducts(){
        return $this->hasMany(SaleProduct::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
