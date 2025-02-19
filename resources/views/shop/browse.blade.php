@extends('layouts.shop', [
    'model_title' => 'Gêneros',
    'page_title' => 'Gêneros',
])
@section('content')
    <div class="row">
        @foreach ($item_list as $item)
            <x-shop-genre-image :$item />
        @endforeach
    </div>
@stop
