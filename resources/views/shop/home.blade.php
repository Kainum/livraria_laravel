@extends('layouts.shop', [
    'page_title' => 'Home',
])
@section('content')
    <div>
        <img src="{{ asset('storage/images/banner.png') }}" alt="Banner">
    </div>
    <div>
        <h2 class="text-center">DESTAQUES</h2>
        <div class="d-flex flex-row flex-nowrap overflow-auto gap-3">
            @foreach ($item_list as $item)
                <x-shop-collection-image :$item />
            @endforeach
        </div>
    </div>

@stop
