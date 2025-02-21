@extends('layouts.default_loja', [
    'model_title'   => 'Endereços',
    'page_title'    => 'Novo Endereço',
])
@section('content')
    <h2>Novo Endereço</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>'enderecos.store']) }}
        <div class="form-group">
            {{ Form::label('cep', 'CEP: ') }}
            {{ Form::text('cep', null, ['class'=>'form-control cep', 'required', 'placeholder'=>'00000-000', 'maxlength'=>9]) }}
        </div>
        <div class="form-group">
            {{ Form::label('endereco', 'Endereço: ') }}
            {{ Form::text('endereco', null, ['class'=>'form-control', 'required', 'maxlength'=>200]) }}
        </div>
        <div class="form-group">
            {{ Form::label('numero', 'Nº: ') }}
            {{ Form::text('numero', null, ['class'=>'form-control', 'required', 'maxlength'=>10]) }}
        </div>
        <div class="form-group">
            {{ Form::label('bairro', 'Bairro: ') }}
            {{ Form::text('bairro', null, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('cidade', 'Cidade: ') }}
            {{ Form::text('cidade', null, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('uf', 'UF: ') }}
            {{ Form::text('uf', null, ['class'=>'form-control', 'required', 'maxlength'=>2]) }}
        </div>
        <div class="form-group">
            {{ Form::label('complemento', 'Complemento: ') }}
            {{ Form::text('complemento', null, ['class'=>'form-control', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('destinatario', 'Destinatário: ') }}
            {{ Form::text('destinatario', null, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone_number', 'Telefone: ') }}
            {{ Form::text('phone_number', null, ['class'=>'form-control phone_with_ddd', 'required', 'placeholder'=>'(00) 00000-0000', 'maxlength'=>20]) }}
        </div>
        

        <div class="form-group">
            {{ Form::submit('Criar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop