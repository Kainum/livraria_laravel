@extends('master', ['model_title' => 'Loja'])
@section('content')
    <h2>Gêneros</h2>
    <div class="row col-12">
        @foreach ($item_list as $item)
            <a href=""></a>
            <div class="col-6 col-sm-4 col-xl-3 mb-1 container" style="position: relative;">
                <img class="img-fluid" src="https://cineclick-static.flixmedia.cloud/1280/processed/69/1080x1620_1591038417.webp">
                <div class='col-11' style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color:red">
                    <center>
                        <p class="h3">{{ $item->nome }}</p>
                    </center>
                </div>
               
            </div>
        @endforeach
    </div>
@stop