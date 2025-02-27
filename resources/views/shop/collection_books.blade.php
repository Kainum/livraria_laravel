@extends('layouts.shop', [
    'model_title' => "Coleção $collection->name",
    'page_title' => "Coleção $collection->name",
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
