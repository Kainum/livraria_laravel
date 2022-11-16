@extends('master_admin', [
    'model_title' => 'Gêneros',
    'page_title' => 'Editar Gênero',
    ])
@section('content')
    <h2>Editando Gênero {{ $genero->nome }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>["admin.generos.update", 'id'=>$genero->id],'method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', $genero->nome, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('imagem', 'Arquivo da imagem: ') }}
            {{ Form::text('imagem', $genero->imagem, ['class'=>'form-control', 'required', 'disabled']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop