<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Posts extends Model
{
    use HasFactory;
    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }


}
