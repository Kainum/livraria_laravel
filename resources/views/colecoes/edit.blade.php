@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h2>Editando Coleção {{ $colecao->nome }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["admin.editoras.update", 'id'=>$colecao->id],'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome: ') !!}
            {!! Form::text('nome', $colecao->nome, ['class'=>'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar alteração', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop