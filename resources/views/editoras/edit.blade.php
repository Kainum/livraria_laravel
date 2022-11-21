@extends('master_admin', [
    'model_title' => 'Editoras',
    'page_title' => 'Editar Editora',
    ])
@section('content')
    <h2>Editando Editora {{ $item->nome }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>["admin.editoras.update", 'id'=>\Crypt::encrypt($item->id)],'method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', $item->nome, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop