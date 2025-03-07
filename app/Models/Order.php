<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        'order_date',
        'endereco',
        'total_value',
        'servicoFrete',
        'valorFrete',
        'status',
        'cpf',
        'client_id',
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Book::class, 'order_product')->using(OrderProduct::class)->withPivot([
            'id',
            'quantity',
            'unit_value',
            'item_value',
        ]);
    }
}
