<?php

namespace QH\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','content','thumb','status','user_id'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

}
