@extends('layouts.shop', [
    'model_title'   => 'Loja',
    'page_title'    => 'Pedido',
])
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <p>{{ ($endereco->endereco.", ".$endereco->numero." - ".$endereco->bairro) }}</p>
    <p>{{ ($endereco->cidade.", ".$endereco->uf." - ".$endereco->cep) }}</p>
    <div>

        <form action="{{ route('cart.concluir') }}" method="post">
            @csrf

            <div class="form-check">
                <input class="form-check-input" value="{{ App\Models\Correios::SERVICO_PAC }}" type="radio" name="frete" id="frete1" checked>
                <label class="form-check-label" for="frete1">
                    10,00
                    {{-- {{ "PAC - ".(session('frete_options')[App\Models\Correios::SERVICO_PAC]->PrazoEntrega)." dias - R$".(session('frete_options')[App\Models\Correios::SERVICO_PAC]->Valor) }} --}}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="{{ App\Models\Correios::SERVICO_SEDEX }}" type="radio" name="frete" id="frete2">
                <label class="form-check-label" for="frete2">
                    10,00
                    {{-- {{ "SEDEX - ".(session('frete_options')[App\Models\Correios::SERVICO_SEDEX]->PrazoEntrega)." dias - R$".(session('frete_options')[App\Models\Correios::SERVICO_SEDEX]->Valor) }} --}}
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
            {{-- {{ Form::submit('Confirmar Pedido', ['class'=>'btn btn-primary']) }} --}}
        </form>
        
    </div>
    
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
                    <td>
                        {{-- <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=> \App\Models\Book::find($item->id)->imagem,
                        'width'=>576,
                        'height'=>760,
                        ]) }}"> --}}
                        <img class="img-fluid" width="576px" height="760px"
                        src="https://br.web.img3.acsta.net/medias/nmedia/18/93/64/37/20269376.jpg">
                    </td>
                    <td>{{ $item->produto->titulo }}</td>
                    <td>R${{ \App\Util::formataDinheiro($item->valor_unitario) }}</td>
                    <td>{{ $item->qtd }}</td>
                    <td>R${{ \App\Util::formataDinheiro($item->valor_item) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop