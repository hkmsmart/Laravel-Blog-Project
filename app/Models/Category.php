<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Category extends Model
{
    use HasFactory;

    public function postCount(){
        return $this->hasMany(Posts::class,'category_id','id')->where('deleted_at','=',null)->count();
    }
}
