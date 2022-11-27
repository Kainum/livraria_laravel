@extends('master_admin', [
    'model_title' => 'Gêneros',
    'page_title' => 'Editar Gênero',
    ])
@section('content')
    <h2>Editando Gênero {{ $item->nome }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>["admin.generos.update", 'id'=>\Crypt::encrypt($item->id)], 'method'=>'put', 'files'=>true,]) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', $item->nome, ['class'=>'form-control', 'required', 'maxlength'=>50]) }}
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Alterar arquivo de imagem: ') }}
            {{ Form::file('file', null, ['class'=>'form-control',]) }}
        </div>
        <div class="form-group">
            {{ Form::label('imagem', 'Arquivo da imagem: ') }}
            {{ Form::text('imagem', $item->imagem, ['class'=>'form-control', 'disabled']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop