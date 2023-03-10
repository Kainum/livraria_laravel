@extends('master', [
    'model_title'   => 'Livros',
    'page_title'    => 'Livros',
])
@section('content')
    <div class="row col-12">
        @if (count($item_list) === 0)
            <div>Sem resultados</div>
        @endif
        @foreach ($item_list as $item)
            <div class="col-6 col-sm-4 col-xl-3 mb-4">
                <a href="{{ route('produto.view', ['id'=>\Crypt::encrypt($item->id)]) }}">
                    <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}">
                </a>
                <a href="{{ route('produto.view', ['id'=>\Crypt::encrypt($item->id)]) }}">
                    {{ $item->titulo }}
                </a>
                {{ Form::open(['route'=>['produto.view', 'id'=>\Crypt::encrypt($item->id)],'method'=>'get']) }}
                    <div class="row align-items-center">
                        <span class="col-7">R${{ \App\Util::formataDinheiro($item->preco) }}</span>
                        @if ($item->qtd_estoque > 0)
                            <button class="btn btn-success col-4 float-right" type="submit">
                                <i class="fa-solid fa-cart-shopping" style="color:white"></i>
                            </button>
                        @else
                            <button class="btn btn-warning col-4 float-right" type="submit">
                                <i class="fa-solid fa-triangle-exclamation" style="color:white"></i>
                            </button>
                        @endif
                        
                    </div>
                {{ Form::close() }}
            </div>
        @endforeach
        {{ $item_list->links() }}
    </div>
@stop