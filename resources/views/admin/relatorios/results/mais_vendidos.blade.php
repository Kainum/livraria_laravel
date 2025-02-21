@php
    $dates_text = Carbon\Carbon::parse($dataInicio)->format('d/m/Y') . " ~ " . Carbon\Carbon::parse($dataFim)->format('d/m/Y');
@endphp
@extends('layouts.relatorios', [
    'page_title' => "Vendas $dates_text" ,
])
@section('content')
    <div class="container bg-white p-4">
        <h2 class="text-center border border-2 p-2">Produtos Mais Vendidos: {{ $dates_text }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Qtd. vendida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $book_id => $qtd)
                    <tr>
                        <td>{{ App\Models\Book::find($book_id)->titulo }}</td>
                        <td>{{ $qtd }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection