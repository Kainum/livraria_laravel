<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $table = "order_product";
    protected $fillable = [
        'quantity',
        'unit_value',
        'item_value',
        'order_id',
        'book_id',
    ];

    public function pedido() {
        return $this->belongsTo(Order::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
