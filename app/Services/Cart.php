<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class Cart {

    public static function content() {
        $cart = Pedido::where([
            'status' => OrderStatusEnum::CART,
            'comprador_id' => Auth::guard('web')->user()->id,
        ])->with('items')->first();

        return $cart;
    }

}