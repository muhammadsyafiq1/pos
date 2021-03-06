<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id','paid_amount','balance','payment_method','user_id','transac_date','transact_amount'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
