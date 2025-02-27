@extends('layouts.shop', [
    'model_title' => "Resultados da pesquisa",
    'page_title' => "Resultados da pesquisa",
])
@section('content')
    <div class="row">
        @forelse ($books as $item)
            <x-shop.book-image :$item />
        @empty
            <div>Sem resultados</div>
        @endforelse

        {{ $books->links() }}

    </div>
@stop
