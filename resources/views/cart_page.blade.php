@extends('master', ['model_title' => 'Loja'])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div>
        <h2>Carrinho</h2>
        Qtd total de items: {{ $qtd_total }}
        Total valor: R${{ Cart::total() }}
        @foreach ($item_list as $item)
            <div class="row">
                <div class="row col-md-9">
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
                <div class="row col-md-3">
                    <p class="col-lg-8 col-md-12 col-8">qtd {{ $item->qty }}</p>
                    <p class="col-lg-4 col-md-12 col-4">excluir</p>
                </div>
                
            </div>
        @endforeach
    </div>
@stop