<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = "order_product";
    protected $fillable = [
        'qtd',
        'valor_unitario',
        'valor_item',
        'pedido_id',
        'produto_id',
    ];

    public function pedido() {
        return $this->belongsTo(Order::class);
    }

    public function produto() {
        return $this->belongsTo(Book::class);
    }
}
