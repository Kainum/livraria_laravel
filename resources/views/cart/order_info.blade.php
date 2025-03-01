@extends('layouts.shop', [
    'model_title' => 'Loja',
    'page_title' => 'Order',
])
@section('content')

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <div>
        <p>{{ "$endereco->logradouro, $endereco->numero - $endereco->bairro" }}</p>
        <p>{{ "$endereco->cidade, $endereco->uf - $endereco->cep" }}</p>
    </div>

    <form action="{{ route('cart.confirm') }}" method="post">
        @csrf

        <div class="form-check">
            <input class="form-check-input" value="{{ App\Models\Correios::SERVICO_PAC }}" type="radio" name="frete"
                id="frete1" checked>
            <label class="form-check-label" for="frete1">
                10,00
                {{-- {{ "PAC - ".(session('frete_options')[App\Models\Correios::SERVICO_PAC]->PrazoEntrega)." dias - R$".(session('frete_options')[App\Models\Correios::SERVICO_PAC]->Valor) }} --}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="{{ App\Models\Correios::SERVICO_SEDEX }}" type="radio" name="frete"
                id="frete2">
            <label class="form-check-label" for="frete2">
                10,00
                {{-- {{ "SEDEX - ".(session('frete_options')[App\Models\Correios::SERVICO_SEDEX]->PrazoEntrega)." dias - R$".(session('frete_options')[App\Models\Correios::SERVICO_SEDEX]->Valor) }} --}}
            </label>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Confirmar Order</button>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-nowrap align-middle mb-0">
            <thead class="thead-light">
                <tr>
                    <th class="col-1"></th>
                    <th class="col-6">Produto</th>
                    <th class="col-1 text-end">Preço</th>
                    <th class="col-1 text-center">Qtd</th>
                    <th class="col-2 col-sm-1 text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_list as $item)
                    <tr>
                        <td>
                            <img class="object-fit-cover" style="width:576px;"
                                src="{{ $item->image ? Storage::url($item->image) : asset('/assets/images/fill/fill_book.jpg') }}">
                        </td>
                        <td>{{ $item->product_name }}</td>
                        <td class="text-end">{{ \App\Services\Operations::money($item->pivot->unit_value) }}</td>
                        <td class="text-center">{{ $item->pivot->quantity }}</td>
                        <td class="text-end">{{ \App\Services\Operations::money($item->pivot->item_value) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
