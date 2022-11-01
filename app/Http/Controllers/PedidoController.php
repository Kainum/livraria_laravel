<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use App\Models\Pedido;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    
    public function fazerPedido() {
        $user_id = Auth::guard('web')->user()->id; //pega o id do user
        $lista_items = Cart::content();

        //mudar isso aqui depois
        $data_pedido = date('Y-m-d'); 
        $endereco = 'Rua Estrada sem número, 000 - cidade, TR, Brazil';
        $valor_frete = 10.00;

        $new_pedido = Pedido::create([
            'data_pedido'=>$data_pedido,
            'endereco'=>$endereco,
            'valorTotal'=>Cart::total(),
            'valorFrete'=>$valor_frete,
            'status'=>'ABE',
            'comprador_id'=>$user_id,
        ]);
        foreach($lista_items as $item) {
            ItemPedido::create([
                'qtd'=>$item->qty,
                'valor_unitario'=>$item->price,
                'valor_item'=>($item->price * $item->qty),
                'pedido_id'=>$new_pedido->id,
                'produto_id'=>$item->id,
            ]);
        }
        //return redirect()->route('wishlist');
    }

}
