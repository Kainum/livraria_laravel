@extends('layouts.shop', [
    'model_title' => "Coleção $collection->name",
    'page_title' => "Coleção $collection->name",
])
@section('content')
    <div class="row">
        @forelse ($livros as $item)
            <x-shop-book-image :$item />
        @empty
            <div>Sem resultados</div>
        @endforelse

        {{ $livros->links() }}

    </div>
@stop
