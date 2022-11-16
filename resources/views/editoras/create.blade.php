@extends('master_admin', [
    'model_title' => 'Editoras',
    'page_title' => 'Criar Editora',
    ])
@section('content')
    <h2>Nova Editora</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>'admin.editoras.store']) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', null, ['class'=>'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Criar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop