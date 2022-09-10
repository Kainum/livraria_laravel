@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h1>Novo Gênero</h1>
    {!! Form::open(['url'=>'admin/generos/store']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome: ') !!}
            {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagem', 'URL imagem: ') !!}
            {!! Form::text('imagem', null, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop