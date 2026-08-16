<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = [
        'customer_name', 
        'phone', 
        'delivery_type', 
        'address', 
        'landmark', 
        'note', 
        'total', 
        'items_detail', 
        'order_created_at',
        'payment_method',
        'payment_status'
    ];

    protected $casts = [
        'items_detail' => 'array'
    ];
}