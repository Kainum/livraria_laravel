@extends('master', [
    'model_title'   => 'Endereços',
    'page_title'    => 'Editar Endereço',
])
@section('content')
    <h2>Editando Endereço</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>["enderecos.update", 'id'=>$endereco->id],'method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('cep', 'CEP: ') }}
            {{ Form::text('cep', $endereco->cep, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('endereco', 'Endereço: ') }}
            {{ Form::text('endereco', $endereco->endereco, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('numero', 'Nº: ') }}
            {{ Form::text('numero', $endereco->numero, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bairro', 'Bairro: ') }}
            {{ Form::text('bairro', $endereco->bairro, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('cidade', 'Cidade: ') }}
            {{ Form::text('cidade', $endereco->cidade, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('uf', 'UF: ') }}
            {{ Form::text('uf', $endereco->uf, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('complemento', 'Complemento: ') }}
            {{ Form::text('complemento', $endereco->complemento, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('destinatario', 'Destinatário: ') }}
            {{ Form::text('destinatario', $endereco->destinatario, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('telefone', 'Telefone: ') }}
            {{ Form::text('telefone', $endereco->telefone, ['class'=>'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop