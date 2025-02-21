@extends('layouts.shop', [
    'model_title' => 'Loja',
    'page_title' => 'Order',
])
@section('content')

    <div class="row m-0">
        @foreach ($lista_enderecos as $item)
            <div class="col-md-4 col-12 border border-2 p-3">
                <p>
                    <span class="fw-black">{{ $item->destinatario }}</span><br>
                    <span>{{ "$item->endereco, $item->numero" }}</span><br>
                    <span>{{ $item->bairro }}</span><br>
                    <span>{{ "$item->cidade, $item->uf, $item->cep" }}</span><br>
                    <span>Telefone: {{ $item->phone_number }}</span>
                </p>

                <form action="{{ route('cart.confirmar') }}" method="post">
                    @csrf

                    <input type="hidden" name="endereco" value="{{ \Crypt::encrypt($item->id) }}">
                    <button type="submit" class="btn btn-primary">Escolher</button>
                </form>

                <a href="{{ route('enderecos.edit', ['id' => \Crypt::encrypt($item->id)]) }}"
                    class="btn btn-success">Editar esse Endereço</a>

            </div>
        @endforeach
    </div>

    <a href="{{ route('enderecos.create') }}" class="btn btn-info mt-3">Novo Endereço</a>
@stop
