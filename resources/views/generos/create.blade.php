@extends('master_admin', [
    'model_title' => 'Gêneros',
    'page_title' => 'Criar Gênero',
    ])
@section('content')
    <h2>Novo Gênero</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>'admin.generos.store', 'files'=>true]) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', null, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Arquivo de imagem: ') }}
            {{ Form::file('file', null, ['class'=>'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Criar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop