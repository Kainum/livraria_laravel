<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Correios;
use App\Models\Address;
use App\Models\OrderProduct;
use App\Models\Book;
use App\Models\Order;
use App\Services\Cart;
use App\Services\Operations;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function view_cart_page() {
        $cart = Cart::content();

        $qtd_total = $cart?->items->sum(function ($q) {
            return $q->pivot->quantity;
        }) ?? 0;
        
        return view('cart.cart_page', compact('cart', 'qtd_total'));
    }

    public function store (Request $request) {

        $product_id = Operations::decryptId($request->product_id);
        $product = Book::find($product_id);

        // acha o carrinho existente ou cria um novo
        $order = Order::firstOrCreate([
            'client_id' => Auth::guard('web')->user()->id,
            'status' => OrderStatusEnum::CART,
        ]);

        // verifica se o item já existe no carrinho
        // se existe, atualiza a quantidade
        // se não existe, cria um novo
        $item = $order->items()->where('book_id', $product->id)->first();
        if ($item) {
            $item->pivot->update([
                'quantity' => $request->quantity + $item->pivot->quantity,
                'item_value' => $product->price * ($request->quantity + $item->pivot->quantity),
            ]);
        } else {
            OrderProduct::create([
                'order_id' => $order->id,
                'book_id' => $product->id,
                'quantity' => $request->quantity,
                'unit_value' => $product->price,
                'item_value' => $product->price * $request->quantity,
            ]);
        }

        // controla a quantidade máxima de produtos do mesmo tipo
        // CONSERTAR ISSO MAIS TARDE

        // $cart_prod = Cart::search(function($cartItem) use ($product) {
        //     return $cartItem->id === $product->id;
        // })->first();

        // $qtd_ajustada = min($cart_prod->qty, min($product->qty_in_stock, Util::QTD_MAX_POR_CLIENTE));
        // Cart::update($cart_prod->rowId, ['qty' => $qtd_ajustada]);

        return redirect()->route('cart.page')->with('message', 'Item adicionado ao carrinho.');
    }


    public function cart_add ($id) {
        // não permite que a quantidade seja maior que o estabelecido
        $item = OrderProduct::find($id);
        $qty_in_stock = $item->book->qty_in_stock;

        $item->update([
            'quantity' => min($item->quantity + 1, min($qty_in_stock, Util::QTD_MAX_POR_CLIENTE)),
        ]);

        return redirect()->route('cart.page');
    }

    public function cart_sub ($id) {
        $item = OrderProduct::find($id);

        $new_qtd = $item->quantity - 1;

        if ($new_qtd == 0) {
            $item->delete();
        } else {
            $item->update([
                'quantity' => $new_qtd,
            ]);
        }

        return redirect()->route('cart.page');
    }

    public function cart_exclude ($id) {
        $item = OrderProduct::find($id);
        $item->delete();

        return redirect()->route('cart.page');
    }

    public function select_address() {

        if (Cart::content()?->items->count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $lista_enderecos = Auth::guard('web')->user()->addresses; //pega os enderecos do user

        return view('cart.select_address', compact('lista_enderecos'));
    }

    
}
