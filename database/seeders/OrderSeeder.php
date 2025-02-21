<?php

namespace Database\Seeders;

use App\Enums\OrderStatusEnum;
use App\Models\Correios;
use App\Models\Address;
use App\Models\OrderProduct;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
                'livro' =>Book::find(1),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Book::find(3),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Book::find(7),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Book::find(10),
                'qtd'   =>random_int(1, 4),
            ],
        ];

        $cliente = User::find(1);
        $list_end = Address::where('usuario_id', '=', $cliente->id)
                        ->get();
        
        $end = $list_end[0];

        $dataPedido = '2022-11-25';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Book::find(2),
                'qtd'   =>random_int(1, 5),
            ],
            [
                'livro' =>Book::find(9),
                'qtd'   =>random_int(2, 5),
            ],
            [
                'livro' =>Book::find(11),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Book::find(12),
                'qtd'   =>random_int(2, 3),
            ],
            [
                'livro' =>Book::find(13),
                'qtd'   =>random_int(1, 4),
            ],
        ];

        $dataPedido = '2022-11-11';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Book::find(9),
                'qtd'   =>random_int(1, 4),
            ],
            [
                'livro' =>Book::find(3),
                'qtd'   =>random_int(1, 7),
            ],
            [
                'livro' =>Book::find(2),
                'qtd'   =>random_int(1, 6),
            ],
            [
                'livro' =>Book::find(15),
                'qtd'   =>random_int(1, 7),
            ],
        ];

        $end = $list_end[1];

        $dataPedido = '2022-10-20';
        $this->criar($produtos, $cliente, $end, $dataPedido);

        // ===================================================================

        $produtos = [
            [
                'livro' =>Book::find(6),
                'qtd'   =>random_int(1, 10),
            ],
            [
                'livro' =>Book::find(4),
                'qtd'   =>random_int(2, 10),
            ],
            [
                'livro' =>Book::find(11),
                'qtd'   =>random_int(3, 10),
            ],
            [
                'livro' =>Book::find(13),
                'qtd'   =>random_int(1, 10),
            ],
        ];

        $cliente = User::find(2);
        $list_end = Address::where('usuario_id', '=', $cliente->id)
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
        $pedido = Order::create([
            'data_pedido'   =>$dataPedido,
            'endereco'      =>$endereco,
            'valorTotal'    =>$valorTotal,
            'servicoFrete'  =>Correios::SERVICO_PAC,
            'valorFrete'    =>10.00,
            'status'        =>OrderStatusEnum::PAID,
            'cpf'           =>$cliente->cpf,
            'client_id'  =>$cliente->id,
        ]);

        foreach($produtos as $p) {
            OrderProduct::create([
                'qtd'               =>$p["qtd"],
                'unit_value'    =>$p["livro"]->preco,
                'item_value'        =>$p["livro"]->preco * $p["qtd"],
                'book_id'        =>$p["livro"]->id,
                'order_id'         =>$pedido->id,
            ]);
        }
    }
}
