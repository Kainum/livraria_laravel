<?php

namespace App\Http\Controllers;

use App\Models\Correios;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Livro;
use App\Models\Pedido;
use App\Util;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{

    public function cartPage() {
        $list = Cart::content();
        $qtd_total = 0;
        foreach ($list as $key => $value) {
            $qtd_total += $value->qty;
        }
        return view('cart_page', ['item_list'=>$list, 'qtd_total'=>$qtd_total]);
    }

    public function store (Request $request) {
        $this->middleware('VerifyCsfrToken');

        $req = $request->all();
        $product = Livro::find(Crypt::decrypt($req['product_id']));
        
        Cart::add(
            $product->id,
            $product->titulo,
            $req['quantity'],
            $product->preco,
            181,    // peso
        );

        // controla a quantidade máxima de produtos do mesmo tipo
        $cart_prod = Cart::search(function($cartItem) use ($product) {
            return $cartItem->id === $product->id;
        })->first();

        $qtd_ajustada = min($cart_prod->qty, min($product->qtd_estoque, Util::QTD_MAX_POR_CLIENTE));
        Cart::update($cart_prod->rowId, ['qty' => $qtd_ajustada]);

        return redirect()->route('cart.page')->with('message', 'Item adicionado ao carrinho.');
    }


    public function cartAdd ($rowId) {
        // não permite que a quantidade seja maior que o estabelecido
        $product = Cart::get($rowId);                           // acha o produto
        $estoque = Livro::find($product->id)->qtd_estoque;      // descobre a quantidade no estoque
        $nova_qtd = min($product->qty + 1, min($estoque, Util::QTD_MAX_POR_CLIENTE));   // atualiza a quantidade no carrinho baseado no estoque e qtd max por cliente

        Cart::update($rowId, ['qty' => $nova_qtd]);
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


    public function selecionarEndereco() {
        $this->middleware('VerifyCsfrToken');

        if (Cart::count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $user_id = Auth::guard('web')->user()->id; //pega o id do user

        $lista_enderecos =  Endereco::where('usuario_id', '=', $user_id)->get();

        return view('customer_pedido.enderecos_page', ['lista_enderecos'=>$lista_enderecos]);
    }

    
}
