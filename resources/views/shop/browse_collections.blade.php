@extends('layouts.shop', [
    'model_title' => "Coleções de $genre->name",
    'page_title' => "Coleções de $genre->name",
])
@section('content')
    <div class="row justify-content-around">
        @forelse ($genre->collections as $item)
            <x-shop.collection-image :$item />
        @empty
            <div class="text-center p-5">
                <p class="m-0">Nenhuma coleção encontrada.</p>
            </div>
        @endforelse
    </div>
@stop
