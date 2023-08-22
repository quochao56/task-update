<?php

namespace QH\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'location'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function warehouseStores(){
        return $this->hasMany(WarehouseStore::class);
    }
    public function productStores(){
        return $this->hasMany(ProductStore::class);
    }
}
