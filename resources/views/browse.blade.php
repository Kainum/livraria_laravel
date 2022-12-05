@extends('master', [
    'model_title'   => 'Gêneros',
    'page_title'    => 'Gêneros',
])
@section('content')
    <div class="row col-12">
        @foreach ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-4" style="position: relative;">
                <a href="{{ route('browse.colecoes', ['id'=>\Crypt::encrypt($item->id)]) }}">
                    <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}">
                    <div class='col-11' style="position: absolute;left: 50%;top: 90%;transform: translate(-50%, -10%);background-color:dimgray">
                        <center>
                            <p class="h3" style="color: lightgoldenrodyellow">{{ $item->nome }}</p>
                        </center>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{ $item_list->links() }}
@stop