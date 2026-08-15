<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'phone',
        'delivery_type',
        'address',
        'landmark',
        'note',
        'total',
        'status',
        'user_id',
        'payment_method',
        'payment_status',
        'snap_token',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
