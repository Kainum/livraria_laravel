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
    @if ($qtd_total > 0)
        <div class="row">
            <div class="container col-xl-8 mb-4">
                @foreach ($item_list as $item)
                    <div class="row">
                        <div class="row col-md-8">
                            <div class="col-lg-2 col-md-3 col-5">
                                <img class="img-fluid" src="{{ route('image.show', [
                                        'image_path'=> \App\Models\Book::find($item->id)->imagem,
                                        'width'=>576,
                                        'height'=>760,
                                        ]) }}">
                            </div>
                            <div class="row col-lg-10 col-md-9 col-7">
                                <p class="col-lg-6 col-12 my-lg-auto">{{ $item->name }}</p>
                                <p class="col-lg-6 col-12 my-lg-auto">R${{ \App\Util::formataDinheiro($item->price) }}</p>
                            </div>
                        </div>
                        <div class="row col-md-4">
                            <div class="col-md-12 col-8 row mb-2">
                                <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.sub', ['rowId'=>$item->rowId]) }}">
                                    <i class="fa-solid {{ $item->qty != 1 ? "fa-minus" : "fa-trash-can" }}" style="color:gray"></i>
                                </a>
                                <div class="col-6 text-center align-self-center">{{ $item->qty }}</div>
                                @if ($item->qty < min(\App\Models\Book::find($item->id)->qtd_estoque, \App\Util::QTD_MAX_POR_CLIENTE))
                                    <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.add', ['rowId'=>$item->rowId]) }}">
                                        <i class="fa-solid fa-plus" style="color:gray"></i>
                                    </a>
                                @else
                                    <button class="btn btn-secondary col-3 my-auto" disabled>
                                        <i class="fa-solid fa-plus" style="color:gray"></i>
                                    </button>
                                @endif
                            </div>
                            <a class="btn btn-warning offset-md-0 offset-1 col-md-11 col-3 my-auto" href="{{ route('cart.exclude', ['rowId'=>$item->rowId]) }}">excluir</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="container col-xl-4">
                <p class="h2">Carrinho</p>
                <p>Itens no carrinho: <b>{{ $qtd_total }}</b></p>
                <p>Valor Total: <b>R${{ \App\Util::formataDinheiro(Cart::total()) }}</b></p>

                {{ Form::open(['route'=>'cart.endereco']) }}
                    @csrf
                    {{ Form::submit('Continuar Pedido', ['class'=>'btn btn-primary']) }}
                {{Form::close() }}
            </div>
        </div>
    @else
        <p>Seu carrinho está vazio :(</p>
        <a href="{{ route('search') }}" class="btn btn-primary">
            Continuar comprando
        </a>
    @endif
    
@stop