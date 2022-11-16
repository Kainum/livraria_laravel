@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Pedido',
])
@section('content')

    @foreach ($lista_enderecos as $item)
        <p><b>{{ $item->destinatario }}</b></p>
        <p>{{ ($item->endereco.", ".$item->numero) }}</p>
        <p>{{ $item->bairro }}</p>
        <p>{{ ($item->cidade.", ".$item->uf.", ".$item->cep) }}</p>
        <p>Telefone: {{ $item->telefone}}</p>

        {{ Form::open(['route'=>'cart.confirmar']) }}
            {{ Form::hidden('endereco', \Crypt::encrypt($item->id)) }}
            {{ Form::submit('Escolher', ['class'=>'btn btn-primary']) }}
        {{ Form::close() }}

        <a href="{{ route('enderecos.edit',     ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-success">Editar esse Endereço</a>
    @endforeach

    <br>
    <a href="{{ route('enderecos.create', []) }}" class="btn btn-info">Novo Endereço</a>
@stop