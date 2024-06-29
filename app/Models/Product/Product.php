<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img', 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function isHit(){
        return $this->hit === 1;
    }

    public function isNew(){
        return $this->new === 1;
    }

    public function isRecommend(){
        return $this->recommend === 1;
    }
}
