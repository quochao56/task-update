<?php

namespace QH\Blog\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Qh\Product\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
