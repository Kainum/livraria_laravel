@extends('layouts.shop', [
    'model_title' => "Coleções de $genre->nome",
    'page_title' => "Coleções de $genre->nome",
])
@section('content')
    <div class="row justify-content-around">
        @forelse ($genre->colecoes as $item)
            <x-shop-collection-image :$item />
        @empty
            <div class="text-center p-5">
                <p class="m-0">Nenhuma coleção encontrada.</p>
            </div>
        @endforelse
    </div>
@stop
