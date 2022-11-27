@extends('layouts.default_loja', [
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

    {{ Form::open(['route'=>["enderecos.update", 'id'=>\Crypt::encrypt($item->id)],'method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('cep', 'CEP: ') }}
            {{ Form::text('cep', $item->cep, ['class'=>'form-control cep', 'required', 'placeholder'=>'00000-000', 'maxlength'=>9]) }}
        </div>
        <div class="form-group">
            {{ Form::label('endereco', 'Endereço: ') }}
            {{ Form::text('endereco', $item->endereco, ['class'=>'form-control', 'required', 'maxlength'=>200]) }}
        </div>
        <div class="form-group">
            {{ Form::label('numero', 'Nº: ') }}
            {{ Form::text('numero', $item->numero, ['class'=>'form-control', 'required', 'maxlength'=>10]) }}
        </div>
        <div class="form-group">
            {{ Form::label('bairro', 'Bairro: ') }}
            {{ Form::text('bairro', $item->bairro, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('cidade', 'Cidade: ') }}
            {{ Form::text('cidade', $item->cidade, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('uf', 'UF: ') }}
            {{ Form::text('uf', $item->uf, ['class'=>'form-control', 'required', 'maxlength'=>2]) }}
        </div>
        <div class="form-group">
            {{ Form::label('complemento', 'Complemento: ') }}
            {{ Form::text('complemento', $item->complemento, ['class'=>'form-control', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('destinatario', 'Destinatário: ') }}
            {{ Form::text('destinatario', $item->destinatario, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('telefone', 'Telefone: ') }}
            {{ Form::text('telefone', $item->telefone, ['class'=>'form-control phone_with_ddd', 'required', 'maxlength'=>20]) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop