<?php

namespace QH\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;

class ProductWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'qty'
    ];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
