<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;

    protected $table = "item_pedidos";
    protected $fillable = [
        'qtd',
        'valor_unitario',
        'valor_item',
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class);
    }

    public function produto() {
        return $this->belongsTo(Livro::class);
    }
}
