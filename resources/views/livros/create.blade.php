@extends('layouts.default', [
    'model_title' => 'Livros',
    'page_title' => 'Criar Livro',
    'search_route' => 'admin.livros.index',
    ])
@section('content')
    <h2>Novo Livro</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>'admin.livros.store', 'files'=>true]) }}
        <div class="form-group">
            {{ Form::label('titulo', 'Título: ') }}
            {{ Form::text('titulo', null, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>
        <div class="form-group">
            {{ Form::label('isbn', 'ISBN: ') }}
            {{ Form::text('isbn', null, ['class'=>'form-control', 'required', 'maxlength'=>20]) }}
        </div>
        <div class="form-group">
            {{ Form::label('autor', 'Autor: ') }}
            {{ Form::text('autor', null, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Arquivo de imagem: ') }}
            {{ Form::file('file', null, ['class'=>'form-control',]) }}
        </div>
        <div class="form-group">
            {{ Form::label('resumo', 'Resumo: ') }}
            {{ Form::textarea('resumo', null, ['class'=>'form-control', 'required', 'maxlength'=>1000]) }}
        </div>
        <div class="form-group">
            {{ Form::label('data_lancamento', 'Data de Lançamento: ') }}
            {{ Form::date('data_lancamento', null, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('preco', 'Preço: ') }}
            {{ Form::number('preco', 29.99, ['class'=>'form-control money2', 'required', 'min'=>0, 'step'=>0.01]) }}
        </div>
        <div class="form-group">
            {{ Form::label('paginas', 'Nº de Páginas: ') }}
            {{ Form::number('paginas', 200, ['class'=>'form-control', 'required', 'min'=>1]) }}
        </div>
        <div class="form-group">
            {{ Form::label('qtd_estoque', 'Estoque atual: ') }}
            {{ Form::number('qtd_estoque', 100, ['class'=>'form-control', 'required', 'min'=>0]) }}
        </div>
        <div class="form-group">
            {{ Form::label('colecao_id', 'Coleção: ') }}
            {{ Form::select('colecao_id', \App\Models\Colecao::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('editora_id', 'Editora: ') }}
            {{ Form::select('editora_id', \App\Models\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), null, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Criar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop