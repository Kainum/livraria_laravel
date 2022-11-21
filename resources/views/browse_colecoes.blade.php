@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Coleções',
])
@section('content')
    <h2>Coleções</h2>
    <div class="row col-12">
        @forelse ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-1 container" style="position: relative;">
                <a href="{{ route('colecao.view', ['id'=>\Crypt::encrypt($item->colecao->id)]) }}">
                    <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->colecao->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}">
                    <div class='col-11' style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color:red">
                        <center>
                            <p class="h3">{{ $item->colecao->nome }}</p>
                        </center>
                    </div>
                </a>
            </div>
        @empty
            <p>Sem resultados</p>
        @endforelse
    </div>
@stop