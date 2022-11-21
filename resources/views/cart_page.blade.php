@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Meu Carrinho',
])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    @if ($qtd_total > 0)
        <div class="row">
            <div class="container col-xl-8">
                @foreach ($item_list as $item)
                    <div class="row">
                        <div class="row col-md-8">
                            <div class="col-lg-2 col-md-3 col-5">
                                <img class="img-fluid" src="{{ route('image.show', [
                                        'image_path'=> \App\Models\Livro::find($item->id)->imagem,
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
                            <div class="col-lg-8 col-md-12 col-8 row">
                                <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.sub', ['rowId'=>$item->rowId]) }}">
                                    <i class="fa-solid {{ $item->qty != 1 ? "fa-minus" : "fa-trash-can" }}" style="color:gray"></i>
                                </a>
                                <div class="col-6 text-center align-self-center">{{ $item->qty }}</div>
                                @if (\App\Models\Livro::find($item->id)->qtd_estoque > $item->qty)
                                    <a class="btn btn-secondary col-3 my-auto" href="{{ route('cart.add', ['rowId'=>$item->rowId]) }}">
                                        <i class="fa-solid fa-plus" style="color:gray"></i>
                                    </a>
                                @else
                                    <button class="btn btn-secondary col-3 my-auto" disabled>
                                        <i class="fa-solid fa-plus" style="color:gray"></i>
                                    </button>
                                @endif
                            </div>
                            <a class="btn btn-warning offset-lg-1 offset-md-0 offset-1 col-lg-3 col-md-12 col-3 my-auto" href="{{ route('cart.exclude', ['rowId'=>$item->rowId]) }}">excluir</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container col-xl-4">
                <h2>Carrinho</h2>
                <p>Qtd total de items: {{ $qtd_total }}</p>
                <p>Total valor: R${{ \App\Util::formataDinheiro(Cart::total()) }}</p>
                <p>peso: {{ Cart::weight() }}</p>

                {{ Form::open(['route'=>'cart.endereco']) }}
                    @csrf
                    {{ Form::submit('Continuar Pedido', ['class'=>'btn btn-primary']) }}
                {{Form::close() }}
            </div>
        </div>
    @else
        <p>Seu carrinho está vazio :(</p>
        <a href="{{ route('search') }}">
            <button>Continuar comprando</button>
        </a>
    @endif
    
@stop