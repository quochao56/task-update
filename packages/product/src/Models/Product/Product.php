<?php

namespace QH\Product\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QH\Product\Models\Purchase\PurchaseProduct;
use QH\Product\Models\Category\Category;
use App\Models\User;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumb',
        'price',
        'qty',
        'content',
        'category_id',
        'author_id',
        'author_type',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function purchaseProducts(){
        return $this->hasMany(PurchaseProduct::class, 'product_id');
    }
}
