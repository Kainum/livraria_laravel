@extends('master', [
    'model_title' => "Coleção $collection->nome",
    'page_title' => "Coleção $collection->nome",
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
