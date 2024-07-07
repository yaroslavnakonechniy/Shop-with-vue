<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
