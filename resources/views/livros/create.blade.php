@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h2>Novo Livro</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'admin.livros.store']) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Título: ') !!}
            {!! Form::text('titulo', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('isbn', 'ISBN: ') !!}
            {!! Form::text('isbn', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('autor', 'Autor: ') !!}
            {!! Form::text('autor', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagem', 'URL imagem: ') !!}
            {!! Form::text('imagem', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('resumo', 'Resumo: ') !!}
            {!! Form::textarea('resumo', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('data_lancamento', 'Data de Lançamento: ') !!}
            {!! Form::date('data_lancamento', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('preco', 'Preço: ') !!}
            {!! Form::number('preco', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('paginas', 'Nº de Páginas: ') !!}
            {!! Form::number('paginas', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qtd_estoque', 'Estoque atual: ') !!}
            {!! Form::number('qtd_estoque', null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('colecao', 'Coleção: ') !!}
            {!! Form::select('colecao', \App\Models\Colecao::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('editora', 'Editora: ') !!}
            {!! Form::select('editora', \App\Models\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop