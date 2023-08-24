<?php

namespace QH\Warehouse\Models\History;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'qty',
        'total_amount',
        'product',
        'status',
        'links'
    ];
}
