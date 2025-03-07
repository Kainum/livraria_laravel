<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Correios;
use App\Models\Address;
use App\Models\Order;
use App\Services\Cart;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order_info(Request $request)
    {

        $cart = Cart::content();

        if ($cart == null || $cart->items->count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $item_list = $cart->items;

        // FRETE
        $endereco_id = Operations::decryptId($request->endereco_id);
        $endereco = Address::find($endereco_id);

        // $request['cepDestino'] = str_replace("-", "", $endereco->cep);

        // $request['codServico'] = Correios::SERVICO_PAC;
        // $frete_pac = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        // $request['codServico'] = Correios::SERVICO_SEDEX;
        // $frete_sedex = json_decode(app('App\Http\Controllers\CorreiosController')->calcular($request));

        // $frete_options = [Correios::SERVICO_PAC=>$frete_pac, Correios::SERVICO_SEDEX=>$frete_sedex];

        // salva objetos na sessão
        $request->session()->put('endereco', $endereco);
        // $request->session()->put('frete_options', $frete_options);

        return view('cart.order_info', compact('item_list', 'endereco'));
    }

    public function confirm_order(Request $request)
    {

        $cart = Cart::content();

        if ($cart == null || $cart->items->count() == 0) { //se não tem nada então retorna
            return redirect()->route('cart.page')->with('message', 'Erro ao concluir pedido.');
        }

        $end = session('endereco');
        $endereco = $end->destinatario . "<br>" .
            $end->logradouro . ", " . $end->numero . " - " . $end->bairro . "<br>" .
            $end->cep . " - " . $end->cidade . " - " . $end->uf . "<br>" .
            $end->complemento . "<br>" .
            $end->phone_number;


        // CORRIGIR DEPOIS
        $servicoFrete = $request->frete;
        // formata a string de valor para poder guardar no banco
        // $vf =  session('frete_options')[$servicoFrete]->Valor;
        // $valor_frete = floatval(str_replace(',', '.', str_replace('.', '', $vf)));
        $valor_frete = 10.00;


        // =============================

        $cart->update([
            'order_date' => date('Y-m-d'),
            'endereco' => $endereco,
            'status' => OrderStatusEnum::PAID,
            'cpf' => Auth::guard('web')->user()->cpf,
            'total_value' => 100.00, // CORRIGIR DEPOIS
            'servicoFrete' => $servicoFrete,
            'valorFrete' => $valor_frete,
        ]);

        foreach ($cart->items as $item) {
            // ATUALIZA O ESTOQUE DO PRODUTO - retira do estoque
            $item->update(['qty_in_stock' => $item->qty_in_stock - $item->pivot->quantity]);
        }

        return redirect()->route('profile.orders.index')->with('message', 'Order realizado.');
    }

    public function my_orders_page()
    {
        $item_list = Auth::guard('web')->user()->orders()->orderBy('order_date', 'DESC')->get();
        return view('profile.my_orders_page', compact('item_list'));
    }

    public function order_cancel($id)
    {
        try {
            $order_id = Operations::decryptId($id);
            $order = Order::find($order_id);
            
            $user_id = Auth::guard('web')->user()->id;
            if ($order->client_id == $user_id) {
                $order->update([
                    'status' => OrderStatusEnum::CANCELED
                ]);

                // ATUALIZA O ESTOQUE DOS PRODUTOS - devolve pro estoque
                foreach ($order->items as $item) {
                    $item->update(['qty_in_stock' => $item->qty_in_stock + $item->pivot->quantity]);
                }

                $ret = array('status' => 200, 'msg' => 'null');
            } else {
                $ret = array('status' => 401, 'msg' => 'Usuário não autorizado');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
