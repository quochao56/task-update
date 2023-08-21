<?php

namespace QH\Product\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Product\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
