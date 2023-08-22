<?php

namespace QH\Warehouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'warehouse_id'
    ];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
