@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Coleções',
])
@section('content')
    <h2>Coleções</h2>
    <div class="row col-12">
        @foreach ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-1 container" style="position: relative;">
                <img class="img-fluid" src="https://cdn.ome.lt/UCiUyRzCT18cxSjEwKn7hBBNcyo=/770x0/smart/uploads/conteudo/fotos/Poster_Sonic2.jpg">
                <div class='col-11' style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color:red">
                    <center>
                        <p class="h3">{{ $item->colecao->nome }}</p>
                    </center>
                </div>
               
            </div>
        @endforeach
    </div>
@stop