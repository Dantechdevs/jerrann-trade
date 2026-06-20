<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'method', 'amount', 'status',
        'mpesa_receipt', 'mpesa_phone', 'transaction_id',
    ];

    protected $casts = ['amount' => 'decimal:2'];

    public function order() { return $this->belongsTo(Order::class); }
}
