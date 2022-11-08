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
                            <div class="col-lg-1 col-md-3 col-5">
                                <img class="img-fluid" src="{{ route('image.show', [
                                        'image_path'=> \App\Models\Livro::find($item->id)->imagem,
                                        'width'=>576,
                                        'height'=>760,
                                        ]) }}">
                            </div>
                            <div class="row col-lg-11 col-md-9 col-7">
                                <p class="col-lg-6 col-12">{{ $item->name }}</p>
                                <p class="col-lg-6 col-12">{{ $item->price }}</p>
                            </div>
                        </div>
                        <div class="row col-md-4" style="">
                            <div class="col-lg-8 col-md-12 col-8 row" style="margin:0;padding:0">
                                
                                <button class="btn btn-success col-3" type="button" style="" onclick="window.location='{{ route('cart.sub', ['rowId'=>$item->rowId]) }}'">
                                    <i class="fa-solid {{ $item->qty != 1 ? "fa-minus" : "fa-trash-can" }}" style="color:gray"></i>
                                </button>
                                <div class="col-6 text-center align-self-center">{{ $item->qty }}</div>
                                <button class="btn btn-success col-3" type="button" style="" onclick="window.location='{{ route('cart.add', ['rowId'=>$item->rowId]) }}'">
                                    <i class="fa-solid fa-plus" style="color:gray"></i>
                                </button>
                            </div>
                            <button class="btn btn-success offset-lg-1 offset-md-0 offset-1 col-lg-3 col-md-12 col-3" style="" type="button" onclick="window.location='{{ route('cart.exclude', ['rowId'=>$item->rowId]) }}'">
                                excluir
                            </button>
                        </div>
                        
                    </div>
                @endforeach
            </div>
            <div class="container col-xl-4">
                <h2>Carrinho</h2>
                Qtd total de items: {{ $qtd_total }}
                Total valor: R${{ Cart::total() }}
                {{ Form::open(['route'=>'cart.concluir']) }}
                    @csrf
                    {{ Form::submit('Finalizar Pedido', ['class'=>'btn btn-primary']) }}
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