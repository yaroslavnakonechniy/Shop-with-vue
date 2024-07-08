<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'name', 'phone'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count');
    }
}
