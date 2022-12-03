@extends('master', [
    'page_title'    => 'Home',
])
@section('content')
    <div class="col-12" style="height: 250px; background-color: red">

    </div>
    <div class="">
        <center><h2>DESTAQUES</h2></center>
        <div class="d-flex flex-row flex-nowrap overflow-auto">
            @foreach ($item_list as $item)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mx-1">
                    <a href="{{ route('colecao.view', ['id'=>\Crypt::encrypt($item->id)]) }}">
                        <img class="img-fluid" src="{{ route('image.show', [
                            'image_path'=>$item->imagem,
                            'width'=>576,
                            'height'=>760,
                            ]) }}">
                        <div class='col-12'>
                            <center>
                                <p class="h3">{{ $item->nome }}</p>
                            </center>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
@stop