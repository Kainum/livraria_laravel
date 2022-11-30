@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Pedido',
])
@section('content')

    <div class="row">
        @foreach ($lista_enderecos as $item)
            <div class="col-md-4 col-12">
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

            </div>
        @endforeach
    </div>

    <br>
    <a href="{{ route('enderecos.create', []) }}" class="btn btn-info">Novo Endereço</a>
@stop