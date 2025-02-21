@extends('layouts.relatorios', [
    'page_title' => 'Quantidade de Estoque',
])
@section('content')
    <div class="container bg-white p-4">
        <h2 class="text-center border border-2 p-2">Quantidade de Estoque de Produtos</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>ISBN</th>
                    <th>Qtd. em estoque</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->isbn }}</td>
                        <td>{{ $item->qty_in_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection