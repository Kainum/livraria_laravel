<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
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
        return $this->belongsTo(Pedido::class);
    }

    public function produto() {
        return $this->belongsTo(Livro::class);
    }
}
