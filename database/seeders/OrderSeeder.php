<?php

namespace Database\Seeders;

use App\Enums\OrderStatusEnum;
use App\Models\Correios;
use App\Models\OrderProduct;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
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

        $books = Book::select('id', 'price')->inRandomOrder()->limit(4)->get()->map(function ($book) {
            $book->quantity = random_int(1, 4);
            return $book;
        });

        $cliente = User::find(1);

        $end = $cliente->addresses[0];
        $dataPedido = '2022-11-25';

        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = Book::select('id', 'price')->inRandomOrder()->limit(4)->get()->map(function ($book) {
            $book->quantity = random_int(1, 5);
            return $book;
        });

        $dataPedido = '2022-11-11';

        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = Book::select('id', 'price')->inRandomOrder()->limit(4)->get()->map(function ($book) {
            $book->quantity = random_int(1, 7);
            return $book;
        });

        $end = $cliente->addresses[1];
        $dataPedido = '2022-10-20';

        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================

        $books = Book::select('id', 'price')->inRandomOrder()->limit(4)->get()->map(function ($book) {
            $book->quantity = random_int(1, 5);
            return $book;
        });

        $cliente = User::find(2);

        $end = $cliente->addresses[0];

        $dataPedido = '2022-08-15';
        $this->criar($books, $cliente, $end, $dataPedido);

        // ===================================================================
    }

    private function criar($books, $cliente, $end, $dataPedido)
    {

        $total_value = $books->sum(function ($book) {
            return $book->quantity * $book->price;
        });

        $endereco = "$end->destinatario<br>" .
                    "$end->logradouro, $end->numero - $end->bairro<br>" .
                    "$end->cep - $end->cidade - $end->uf<br>" .
                    "$end->complemento<br>" .
                    "$end->phone_number";
        
        $order = Order::create([
            'order_date' => $dataPedido,
            'endereco' => $endereco,
            'total_value' => $total_value,
            'servicoFrete' => Correios::SERVICO_PAC,
            'valorFrete' => 10.00,
            'status' => OrderStatusEnum::PAID,
            'cpf' => $cliente->cpf,
            'client_id' => $cliente->id,
        ]);

        foreach ($books as $book) {
            OrderProduct::create([
                'quantity' => $book->quantity,
                'unit_value' => $book->price,
                'item_value' => $book->price * $book->quantity,
                'book_id' => $book->id,
                'order_id' => $order->id,
            ]);
        }
    }
}
