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

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone){

        if( $this->status == 0){
            $this->status = 1;
            $this->name = $name;
            $this->phone = $phone;
            $this->save();
            session()->forget('orderId');
            return true;
        }else{
            return false;
        }
    }
}