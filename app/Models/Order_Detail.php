<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id','product_id','quantity','unitprice','amount','discount'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

     public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
