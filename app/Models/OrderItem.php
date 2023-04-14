<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'total'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
