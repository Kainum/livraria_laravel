@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Pedido',
])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <p>{{ ($endereco->endereco.", ".$endereco->numero." - ".$endereco->bairro) }}</p>
    <p>{{ ($endereco->cidade.", ".$endereco->uf." - ".$endereco->cep) }}</p>
    <p>{{ print_r(session("frete_options")) }}</p>
    <div class="table-responsive">
        <table class="table table-bordered table-nowrap align-middle mb-0">
            <thead class="thead-light">
                <tr>
                    <th class="col-2"></th>
                    <th class="col-6">Produto</th>
                    <th class="col-1">Preço</th>
                    <th class="col-1">Qtd</th>
                    <th class="col-2 col-sm-1">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_list as $item)
                <tr>
                    <td><img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=> \App\Models\Livro::find($item->id)->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}"></td>
                    <td>{{ $item->name }}</td>
                    <td>R${{ $item->price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>R${{ ($item->price * $item->qty) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop