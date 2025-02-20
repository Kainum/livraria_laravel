@extends('layouts.shop', [
    'model_title'   => 'Carrinho',
    'page_title'    => 'Meu Carrinho',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif
    @if ($cart?->items->count() > 0)
        <div class="row">
            <div class="container col-xl-8 mb-4">
                @foreach ($cart->items as $item)
                    <div class="row">
                        <div class="row col-md-8">
                            <div class="col-lg-2 col-md-3 col-5">
                                <img class="img-fluid" src="{{ route('image.show', [
                                        'image_path'=> $item->produto->imagem,
                                        'width'=>576,
                                        'height'=>760,
                                        ]) }}">
                            </div>
                            <div class="row col-lg-10 col-md-9 col-7">
                                <p class="col-lg-6 col-12 my-lg-auto">{{ $item->produto->nome }}</p>
                                <p class="col-lg-6 col-12 my-lg-auto">R${{ \App\Util::formataDinheiro($item->valor_item) }}</p>
                            </div>
                        </div>
                        <div class="row col-md-4 align-items-center">
                            <div class="col-md-12 col-8 row mb-2 text-black">
                                <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.sub', ['id'=>$item->id]) }}">
                                    <i class="fa-solid fa-{{ $item->qtd > 1 ? "minus" : "trash-can" }}"></i>
                                </a>

                                <div class="col-6 text-center align-self-center">{{ $item->qtd }}</div>

                                @if ($item->qtd < min($item->produto->qtd_estoque, \App\Util::QTD_MAX_POR_CLIENTE))
                                    <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.add', ['id'=>$item->id]) }}">
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                @else
                                    <button class="btn btn-secondary col-3 my-auto" disabled>
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                @endif
                            </div>
                            <a class="btn btn-warning offset-md-0 offset-1 col-md-11 col-3" href="{{ route('cart.exclude', ['id'=>$item->id]) }}">excluir</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="container col-xl-4">
                <p class="h2">Carrinho</p>
                <p>Itens no carrinho: <b>{{ $qtd_total }}</b></p>
                {{-- <p>Valor Total: <b>R${{ \App\Util::formataDinheiro(Cart::total()) }}</b></p> --}}
                <p>Valor Total: <b>R$ {{ \App\Util::formataDinheiro(100.00) }}</b></p>

                <form action="{{ route('cart.endereco') }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Continuar pedido</button>
                </form>
            </div>
        </div>
    @else
        <p>Seu carrinho está vazio.</p>
        <a href="{{ route('search') }}" class="btn btn-primary">
            Continuar comprando
        </a>
    @endif
    
@stop