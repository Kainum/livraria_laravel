@extends('master', [
    'model_title'   => 'Editando Perfil',
    'page_title'    => 'Editando Perfil',
])
@section('content')
    <div class="container">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {{ Form::open(['route'=>["profile.update"],'method'=>'put']) }}
            <div class="form-group">
                {{ Form::label('name', 'Nome: ') }}
                {{ Form::text('name', $item->name, ['class'=>'form-control', 'required', 'maxlength'=>255]) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail: ') }}
                {{ Form::text('email', $item->email, ['class'=>'form-control', 'required', 'maxlength'=>255]) }}
            </div>
            <div class="form-group">
                {{ Form::label('cpf', 'CPF: ') }}
                {{ Form::text('cpf', $item->cpf, ['class'=>'form-control', 'required', 'maxlength'=>14]) }}
            </div>
            <br>
            <div class="form-group">
                {{ Form::label('password', 'Senha: ') }}
                {{ Form::password('password', null, ['class'=>'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>

@stop