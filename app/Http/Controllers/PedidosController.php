<?php

namespace App\Http\Controllers;

use App\Models\Correios;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Livro;
use App\Models\Pedido;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PedidosController extends Controller
{
    public function confirmarPedido(Request $request) {
        $this->middleware('VerifyCsfrToken');

        if (Cart::count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }


        $item_list = Cart::content();

        // FRETE
        $endereco = Endereco::find(Crypt::decrypt($request['endereco']));

        $request['cepDestino'] = str_replace("-", "", $endereco->cep);

        $request['codServico'] = Correios::SERVICO_PAC;
        $frete_pac = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        $request['codServico'] = Correios::SERVICO_SEDEX;
        $frete_sedex = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        $frete_options = [Correios::SERVICO_PAC=>$frete_pac, Correios::SERVICO_SEDEX=>$frete_sedex];

        // salva objetos na sessão
        $request->session()->put('endereco', $endereco);
        $request->session()->put('frete_options', $frete_options);

        return view('customer_pedido.pedido_page', ['item_list'=>$item_list, 'endereco'=>$endereco]);
    }

    public function concluirPedido(Request $request) {
        $this->middleware('VerifyCsfrToken');

        if (Cart::count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $user_id = Auth::guard('web')->user()->id; //pega o id do user
        $end = session('endereco');
        $endereco = $end->destinatario."<br>".
                    $end->endereco.", ".$end->numero." - ".$end->bairro."<br>".
                    $end->cep." - ".$end->cidade." - ".$end->uf."<br>".
                    $end->complemento."<br>".
                    $end->telefone;
        

        $servicoFrete = $request['frete'];

        // formata a string de valor para poder guardar no banco
        $vf =  session('frete_options')[$servicoFrete]->Valor;
        $valor_frete = floatval(str_replace(',', '.', str_replace('.', '', $vf)));

        $item_list =    Cart::content();


        $data_pedido =  date('Y-m-d');

        // =============================
        $new_pedido = Pedido::create([
            'data_pedido'=>$data_pedido,
            'endereco'=>$endereco,
            'valorTotal'=>Cart::total(),
            'servicoFrete'=>$servicoFrete,
            'valorFrete'=>$valor_frete,
            'status'=>Pedido::STATUS_ABERTO,
            'comprador_id'=>$user_id,
            'cpf'=> Auth::guard('web')->user()->cpf,
        ]);
        foreach($item_list as $item) {
            ItemPedido::create([
                'qtd'=>$item->qty,
                'valor_unitario'=>$item->price,
                'valor_item'=>($item->price * $item->qty),
                'pedido_id'=>$new_pedido->id,
                'produto_id'=>$item->id,
            ]);

            // ATUALIZA O ESTOQUE DO PRODUTO
            $livro = Livro::find($item->id);
            $novo_estoque = $livro['qtd_estoque'] - $item->qty;
            $livro->update(['qtd_estoque'=>$novo_estoque]);
        }

        Cart::destroy();
        return redirect()->route('meus_pedidos')->with('message', 'Pedido realizado.');

    }

    public function meusPedidos() {
        $user_id = Auth::guard('web')->user()->id;

        $list = Pedido::where('comprador_id', '=', $user_id)
            ->orderBy('data_pedido', 'DESC')
            ->get();
        return view('meuspedidos_page', ['item_list'=>$list]);
    }

    public function cancelarPedido($id) {
        try {
            $pedido = Pedido::find(Crypt::decrypt($id));
            $user_id = Auth::guard('web')->user()->id;
            if ($pedido->comprador_id == $user_id) {
                $pedido->update(['status'=>Pedido::STATUS_CANCELADO]);
                $ret = array('status'=>200, 'msg'=>'null');
            } else {
                $ret = array('status'=>401, 'msg'=>'Usuário não autorizado');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }
}
