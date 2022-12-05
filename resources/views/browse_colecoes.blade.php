@extends('master', [
    'model_title'   => 'Coleções',
    'page_title'    => 'Coleções',
])
@section('content')
    <div class="row col-12">
        @forelse ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-1 container">
                <a href="{{ route('colecao.view', ['id'=>\Crypt::encrypt($item->colecao->id)]) }}">
                    <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->colecao->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}">
                    <div class='col-12'>
                        <center>
                            <p class="h3">{{ $item->colecao->nome }}</p>
                        </center>
                    </div>
                </a>
            </div>
        @empty
            <p>Sem coleções para o gênero escolhido</p>
        @endforelse
    </div>
@stop