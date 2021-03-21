<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name','phone'
    ];

     public function orderdetail()
    {
    	return $this->hasMany(Order_Detail::class, 'order_id');
    }

      public function transaction()
    {
    	return $this->hasMany(Transaction::class, 'order_id');
    }
}
