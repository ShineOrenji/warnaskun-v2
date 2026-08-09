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
        'order_created_at'
    ];

    protected $casts = [
        'items_detail' => 'array'
    ];
}