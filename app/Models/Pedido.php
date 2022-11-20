<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    const STATUS_ABERTO     = '01';
    const STATUS_CANCELADO  = '05';

    protected $table = "pedidos";
    protected $fillable = [
        'data_pedido',
        'endereco',
        'valorTotal',
        'servicoFrete',
        'valorFrete',
        'status',
        'comprador_id',
    ];

    public function comprador() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(ItemPedido::class);
    }
}
