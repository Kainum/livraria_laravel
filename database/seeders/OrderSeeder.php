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

        $books = [
            [
                'livro' => Book::find(1),
                'quantity'   => random_int(1, 4),
            ],
            [
                'livro' => Book::find(3),
                'quantity'   => random_int(1, 4),
            ],
            [
                'livro' => Book::find(7),
                'quantity'   => random_int(1, 4),
            ],
            [
                'livro' => Book::find(10),
                'quantity'   => random_int(1, 4),
            ],
        ];

        $cliente = User::find(1);
        $list_end = Address::where('usuario_id', '=', $cliente->id)
            ->get();

        $end = $list_end[0];

        $dataPedido = '2022-11-25';
        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = [
            [
                'livro' => Book::find(2),
                'quantity'   => random_int(1, 5),
            ],
            [
                'livro' => Book::find(9),
                'quantity'   => random_int(2, 5),
            ],
            [
                'livro' => Book::find(11),
                'quantity'   => random_int(1, 4),
            ],
            [
                'livro' => Book::find(12),
                'quantity'   => random_int(2, 3),
            ],
            [
                'livro' => Book::find(13),
                'quantity'   => random_int(1, 4),
            ],
        ];

        $dataPedido = '2022-11-11';
        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = [
            [
                'livro' => Book::find(9),
                'quantity'   => random_int(1, 4),
            ],
            [
                'livro' => Book::find(3),
                'quantity'   => random_int(1, 7),
            ],
            [
                'livro' => Book::find(2),
                'quantity'   => random_int(1, 6),
            ],
            [
                'livro' => Book::find(15),
                'quantity'   => random_int(1, 7),
            ],
        ];

        $end = $list_end[1];

        $dataPedido = '2022-10-20';
        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = [
            [
                'livro' => Book::find(6),
                'quantity'   => random_int(1, 10),
            ],
            [
                'livro' => Book::find(4),
                'quantity'   => random_int(2, 10),
            ],
            [
                'livro' => Book::find(11),
                'quantity'   => random_int(3, 10),
            ],
            [
                'livro' => Book::find(13),
                'quantity'   => random_int(1, 10),
            ],
        ];

        $cliente = User::find(2);
        $list_end = Address::where('usuario_id', '=', $cliente->id)
            ->get();

        $end = $list_end[0];

        $dataPedido = '2022-08-15';
        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================
    }

    private function criar($books, $cliente, $end, $dataPedido)
    {
        $total_value = 0;
        foreach ($books as $p) {
            $total_value += $p["quantity"] * $p["livro"]->price;
        }

        $endereco = $end->destinatario . "<br>" .
            $end->logradouro . ", " . $end->numero . " - " . $end->bairro . "<br>" .
            $end->cep . " - " . $end->cidade . " - " . $end->uf . "<br>" .
            $end->complemento . "<br>" .
            $end->phone_number;
        $pedido = Order::create([
            'order_date'   => $dataPedido,
            'endereco'      => $endereco,
            'total_value'    => $total_value,
            'servicoFrete'  => Correios::SERVICO_PAC,
            'valorFrete'    => 10.00,
            'status'        => OrderStatusEnum::PAID,
            'cpf'           => $cliente->cpf,
            'client_id'  => $cliente->id,
        ]);

        foreach ($books as $p) {
            OrderProduct::create([
                'quantity'               => $p["quantity"],
                'unit_value'    => $p["livro"]->price,
                'item_value'        => $p["livro"]->price * $p["quantity"],
                'book_id'        => $p["livro"]->id,
                'order_id'         => $pedido->id,
            ]);
        }
    }
}
