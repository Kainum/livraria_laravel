<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
use App\Models\Livro;
use App\Models\Pedido;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cartPage() {
        $list = Cart::content();
        $qtd_total = 0;
        foreach ($list as $key => $value) {
            $qtd_total += $value->qty;
        }
        //dd($list);
        return view('cart_page', ['item_list'=>$list, 'qtd_total'=>$qtd_total]);
    }

    public function store (Request $request) {
        $product = Livro::find($request->input('product_id'));
        Cart::add(
            $product->id, 
            $product->titulo, 
            $request->input('quantity'), 
            $product->preco,
        );
        return redirect()->route('cart.page')->with('message', 'Adicionado com sucesso.');
    }


    public function cartAdd ($rowId) {
        $atual_qtd = Cart::get($rowId)->qty;
        Cart::update($rowId, ['qty' => $atual_qtd+1]);
        return redirect()->route('cart.page');
    }

    public function cartSub ($rowId) {
        $atual_qtd = Cart::get($rowId)->qty;
        Cart::update($rowId, ['qty' => $atual_qtd-1]);
        return redirect()->route('cart.page');
    }

    public function cartExclude ($rowId) {
        Cart::remove($rowId);
        return redirect()->route('cart.page');
    }


    public function fazerPedido() {
        $this->middleware('VerifyCsfrToken');

        if (Cart::count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

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

        Cart::destroy();
        return redirect()->route('cart.page')->with('message', 'Pedido realizado.');
    }
}
