<?php

namespace QH\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;
use QH\Product\Models\Purchase\Purchase;
use QH\Product\Models\Purchase\PurchaseProduct;
use QH\Product\Models\Sale\Sale;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'location'
    ];

    public function productWarehouses(){
        return $this->hasMany(ProductWarehouse::class);
    }
    public function stores(){
        return $this->hasMany(Store::class);
    }
    public function purchases(){
        return $this->hasMany(PurchaseProduct::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
