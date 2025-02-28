@extends('layouts.shop', [
    'page_title' => 'Home',
])
@section('content')
    <div>
        <img src="{{ asset('assets/images/banner.png') }}" alt="Banner" class="w-100">
    </div>
    <div>
        <h2 class="text-center my-3 display-2">DESTAQUES</h2>
        <div class="d-flex flex-row flex-nowrap overflow-auto gap-5">
            @foreach ($item_list as $item)
                <x-shop.collection-image :$item />
            @endforeach
        </div>
    </div>

@stop
