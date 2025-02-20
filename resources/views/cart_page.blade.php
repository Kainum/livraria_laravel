@extends('layouts.shop', [
    'model_title' => 'Carrinho',
    'page_title' => 'Meu Carrinho',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif
    @if ($cart?->items->count() > 0)
        <div class="row px-4">
            {{-- ITENS --}}
            <div class="col-xl-8 mb-4 p-0 d-flex flex-column gap-2">
                @foreach ($cart->items as $item)
                    <x-shop-cart-item :$item />
                @endforeach
            </div>

            {{-- INFO --}}
            <div class="col-xl-4 m-0">
                <p class="h2">Carrinho</p>
                <p>Itens no carrinho: <b>{{ $qtd_total }}</b></p>
                {{-- <p>Valor Total: <b>R${{ \App\Util::formataDinheiro(Cart::total()) }}</b></p> --}}
                <p>Valor Total: <b>R$ {{ \App\Util::formataDinheiro(100.0) }}</b></p>

                <form action="{{ route('cart.endereco') }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Continuar pedido</button>
                </form>
            </div>
        </div>
    @else
        <div class="text-center p-3">
            <p>Seu carrinho está vazio.</p>
            <a href="{{ route('search') }}" class="btn btn-primary">
                Continuar comprando
            </a>
        </div>
    @endif

@stop
