<?php

namespace QH\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;

class ProductStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'product_id',
        'qty'
    ];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
