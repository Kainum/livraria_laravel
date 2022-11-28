<?php

namespace Database\Seeders;

use App\Models\Correios;
use App\Models\Endereco;
use App\Models\ItemPedido;
use App\Models\Livro;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ===================================================================

        $produtos = [
            [
                'livro' =>Livro::find(1),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Livro::find(3),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Livro::find(7),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Livro::find(10),
                'qtd'   =>random_int(1, 4),
            ],
        ];

        $cliente = User::find(1);
        $list_end = Endereco::where('usuario_id', '=', $cliente->id)
                        ->get();
        
        $end = $list_end[0];

        $dataPedido = '2022-11-25';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Livro::find(2),
                'qtd'   =>random_int(1, 5),
            ],
            [
                'livro' =>Livro::find(9),
                'qtd'   =>random_int(2, 5),
            ],
            [
                'livro' =>Livro::find(11),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Livro::find(12),
                'qtd'   =>random_int(2, 3),
            ],
            [
                'livro' =>Livro::find(13),
                'qtd'   =>random_int(1, 4),
            ],
        ];

        $dataPedido = '2022-11-11';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Livro::find(9),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Livro::find(3),
                'qtd'   =>random_int(1, 7),
            ],
            [
                'livro' =>Livro::find(2),
                'qtd'   =>random_int(1, 6),
            ],
            [
                'livro' =>Livro::find(15),
                'qtd'   =>random_int(1, 7),
            ],
        ];

        $end = $list_end[1];

        $dataPedido = '2022-10-20';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Livro::find(6),
                'qtd'   =>random_int(1, 10),
            ],
            [
                'livro' =>Livro::find(4),
                'qtd'   =>random_int(2, 10),
            ],
            [
                'livro' =>Livro::find(11),
                'qtd'   =>random_int(3, 10),
            ],
            [
                'livro' =>Livro::find(13),
                'qtd'   =>random_int(1, 10),
            ],
        ];

        $cliente = User::find(2);
        $list_end = Endereco::where('usuario_id', '=', $cliente->id)
                        ->get();
        
        $end = $list_end[0];

        $dataPedido = '2022-08-15';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================
    }

    private function criar($produtos, $cliente, $end, $dataPedido) {
        $valorTotal = 0;
        foreach($produtos as $p) {
            $valorTotal += $p["qtd"] * $p["livro"]->preco;
        }

        $endereco = $end->destinatario."<br>".
                    $end->endereco.", ".$end->numero." - ".$end->bairro."<br>".
                    $end->cep." - ".$end->cidade." - ".$end->uf."<br>".
                    $end->complemento."<br>".
                    $end->telefone;
        $pedido = Pedido::create([
            'data_pedido'   =>$dataPedido,
            'endereco'      =>$endereco,
            'valorTotal'    =>$valorTotal,
            'servicoFrete'  =>Correios::SERVICO_PAC,
            'valorFrete'    =>10.00,
            'status'        =>Pedido::STATUS_ABERTO,
            'cpf'           =>$cliente->cpf,
            'comprador_id'  =>$cliente->id,
        ]);

        foreach($produtos as $p) {
            ItemPedido::create([
                'qtd'               =>$p["qtd"],
                'valor_unitario'    =>$p["livro"]->preco,
                'valor_item'        =>$p["livro"]->preco * $p["qtd"],
                'produto_id'        =>$p["livro"]->id,
                'pedido_id'         =>$pedido->id,
            ]);
        }
    }
}
