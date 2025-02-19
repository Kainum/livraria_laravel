@extends('layouts.shop', [
    'model_title'   => 'Alterar Senha',
    'page_title'    => 'Alterar Senha',
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
        
        {{ Form::open(['route'=>["profile.password.update"],'method'=>'put']) }}
        <div class="form-group">
            {{ Form::label('current_password', 'Senha Atual: ') }}
            {{ Form::password('current_password', null, ['class'=>'form-control', 'required']) }}
        </div><div class="form-group">
            {{ Form::label('new_password', 'Nova Senha: ') }}
            {{ Form::password('new_password', null, ['class'=>'form-control', 'required', 'min'=>8]) }}
        </div><div class="form-group">
            {{ Form::label('confirm_password', 'Repetir Senha: ') }}
            {{ Form::password('confirm_password', null, ['class'=>'form-control', 'required', 'min'=>8]) }}
        </div>
            <div class="form-group">
                {{ Form::submit('Alterar', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>

@stop