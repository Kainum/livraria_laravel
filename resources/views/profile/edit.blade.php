@extends('layouts.shop', [
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
                {{ Form::label('cpf', 'CPF: ') }}
                {{ Form::text('cpf', $item->cpf, ['class'=>'form-control cpf', 'required', 'maxlength'=>14]) }}
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

@section('js')
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00', {reverse: false});
        });
    </script>
@stop