<?php

namespace App\Http\Controllers;

use App\Models\Correios;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Livro;
use App\Models\Pedido;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

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
            181,    // peso
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


    public function selecionarEndereco() {
        $this->middleware('VerifyCsfrToken');

        if (Cart::count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $user_id = Auth::guard('web')->user()->id; //pega o id do user

        $lista_enderecos =  Endereco::where('usuario_id', '=', $user_id)->get();
        // $item_list =      Cart::content();

        return view('customer_pedido.enderecos_page', ['lista_enderecos'=>$lista_enderecos]);
        
        // MANDAR PRA UMA PÁGINA ONDE ESCOLHA O ENDEREÇO E O VALOR DE FRETE
        // lista de endereços pra escolher
        // opcoes de fretes
        // botao de confirma - aí sim concluir
        // listagem de produtos

        // ================================================================

        // $endereco = 'Rua Estrada sem número, 000 - cidade, TR, Brazil';
        // $valor_frete = 10.00;

        // $data_pedido = date('Y-m-d');

        // $new_pedido = Pedido::create([
        //     'data_pedido'=>$data_pedido,
        //     'endereco'=>$endereco,
        //     'valorTotal'=>Cart::total(),
        //     'valorFrete'=>$valor_frete,
        //     'status'=>'ABE',
        //     'comprador_id'=>$user_id,
        // ]);
        // foreach($lista_items as $item) {
        //     ItemPedido::create([
        //         'qtd'=>$item->qty,
        //         'valor_unitario'=>$item->price,
        //         'valor_item'=>($item->price * $item->qty),
        //         'pedido_id'=>$new_pedido->id,
        //         'produto_id'=>$item->id,
        //     ]);
        // }

        // Cart::destroy();
        // return redirect()->route('cart.page')->with('message', 'Pedido realizado.');
    }

    public function continuarPedido(Request $request) {
        $this->middleware('VerifyCsfrToken');

        $user_id = Auth::guard('web')->user()->id; //pega o id do user
        $item_list = Cart::content();

        // FRETE
        $endereco = Endereco::find($request['endereco']);

        $request['cepDestino'] = str_replace("-", "", $endereco->cep);

        $request['codServico'] = Correios::SERVICO_PAC;
        $frete_pac = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        $request['codServico'] = Correios::SERVICO_SEDEX;
        $frete_sedex = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        $frete_options = ["pac"=>$frete_pac, "sedex"=>$frete_sedex];

        $request->session()->put('frete_options', $frete_options);

        return view('customer_pedido.pedido_page', ['item_list'=>$item_list, 'endereco'=>$endereco]);
    }
}
