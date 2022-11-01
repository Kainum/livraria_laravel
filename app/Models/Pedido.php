<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedidos";
    protected $fillable = [
        'data_pedido',
        'endereco',
        'valorTotal',
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
