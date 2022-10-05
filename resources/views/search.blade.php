@extends('master', ['model_title' => 'Loja'])
@section('content')
    <h2>Mangás</h2>
    <div class="row col-12">
        @foreach ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-4">
                <a href="{{ route('produto.view', ['id'=>$item->id]) }}">
                    <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}">
                </a>
                <a href="{{ route('produto.view', ['id'=>$item->id]) }}">
                    <h4>{{ $item->titulo }}</h4>
                </a>
                <div class="row align-items-center">
                    <span class="col-7">R${{ $item->preco }}</span>
                    <button class="btn btn-success col-4 float-right" type="button">
                        <i class="fa-solid fa-cart-shopping" style="color:white"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@stop