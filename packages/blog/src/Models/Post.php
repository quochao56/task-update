<?php

namespace QH\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','content','thumb','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}