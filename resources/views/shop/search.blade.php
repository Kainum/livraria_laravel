@extends('layouts.shop', [
    'model_title' => "Resultados da pesquisa",
    'page_title' => "Resultados da pesquisa",
])
@section('content')
    <div class="row">
        @forelse ($livros as $item)
            <x-shop.book-image :$item />
        @empty
            <div>Sem resultados</div>
        @endforelse

        {{ $livros->links() }}

    </div>
@stop
