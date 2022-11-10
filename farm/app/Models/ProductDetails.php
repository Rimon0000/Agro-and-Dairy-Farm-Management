<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function categoryName(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function subcategoryName(){
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }

}
