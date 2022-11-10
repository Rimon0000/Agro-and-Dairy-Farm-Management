<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class SubCategory extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function categoryName(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}