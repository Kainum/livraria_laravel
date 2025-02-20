<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Correios;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Book;
use App\Models\Pedido;
use App\Services\Cart;
use App\Util;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{

    public function cartPage() {
        $cart = Cart::content();

        $qtd_total = 0;
        foreach ($cart?->items as $item) {
            $qtd_total += $item->qtd;
        }
        return view('cart_page', compact('cart', 'qtd_total'));
    }

    public function store (Request $request) {
        $this->middleware('VerifyCsfrToken');

        $product = Book::find(Crypt::decrypt($request->product_id));

        // acha o carrinho existente ou cria um novo
        $order = Pedido::firstOrCreate([
            'comprador_id' => Auth::guard('web')->user()->id,
            'status' => OrderStatusEnum::CART,
        ]);

        // verifica se o item já existe no carrinho
        // se existe, atualiza a quantidade
        // se não existe, cria um novo
        $item = $order->items()->where('produto_id', $product->id)->first();
        if ($item) {
            $item->update([
                'qtd' => $request->quantity + $item->qtd,
                'valor_item' => $product->preco * ($request->quantity + $item->qtd),
            ]);
        } else {
            $order->items()->create([
                'produto_id' => $product->id,
                'qtd' => $request->quantity,
                'valor_unitario' => $product->preco,
                'valor_item' => $product->preco * $request->quantity,
            ]);
        }

        // controla a quantidade máxima de produtos do mesmo tipo
        // CONSERTAR ISSO MAIS TARDE

        // $cart_prod = Cart::search(function($cartItem) use ($product) {
        //     return $cartItem->id === $product->id;
        // })->first();

        // $qtd_ajustada = min($cart_prod->qty, min($product->qtd_estoque, Util::QTD_MAX_POR_CLIENTE));
        // Cart::update($cart_prod->rowId, ['qty' => $qtd_ajustada]);

        return redirect()->route('cart.page')->with('message', 'Item adicionado ao carrinho.');
    }


    public function cartAdd ($id) {
        // não permite que a quantidade seja maior que o estabelecido
        $item = ItemPedido::find($id);
        $qtd_estoque = $item->produto->qtd_estoque;

        $item->update([
            'qtd' => min($item->qtd + 1, min($qtd_estoque, Util::QTD_MAX_POR_CLIENTE)),
        ]);

        return redirect()->route('cart.page');
    }

    public function cartSub ($id) {
        $item = ItemPedido::find($id);

        $new_qtd = $item->qtd - 1;

        if ($new_qtd == 0) {
            $item->delete();
        } else {
            $item->update([
                'qtd' => $new_qtd,
            ]);
        }

        return redirect()->route('cart.page');
    }

    public function cartExclude ($id) {
        $item = ItemPedido::find($id);
        $item->delete();

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
