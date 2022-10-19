<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function cartPage() {
        $list = Cart::content();
        $qtd_total = 0;
        foreach ($list as $key => $value) {
            $qtd_total += $value->qty;
        }
        // dd($list);
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
}
