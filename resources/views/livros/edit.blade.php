@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h2>Editando Livro {{ $livro->nome }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["admin.livros.update", 'id'=>$livro->id],'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('titulo', 'Título: ') !!}
            {!! Form::text('titulo', $livro->titulo, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('isbn', 'ISBN: ') !!}
            {!! Form::text('isbn', $livro->isbn, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('autor', 'Autor: ') !!}
            {!! Form::text('autor', $livro->autor, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagem', 'URL imagem: ') !!}
            {!! Form::text('imagem', $livro->imagem, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('resumo', 'Resumo: ') !!}
            {!! Form::textarea('resumo', $livro->resumo, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('data_lancamento', 'Data de Lançamento: ') !!}
            {!! Form::date('data_lancamento', $livro->data_lancamento, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('preco', 'Preço: ') !!}
            {!! Form::number('preco', $livro->preco, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('paginas', 'Nº de Páginas: ') !!}
            {!! Form::number('paginas', $livro->paginas, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qtd_estoque', 'Estoque atual: ') !!}
            {!! Form::number('qtd_estoque', $livro->qtd_estoque, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('colecao', 'Coleção: ') !!}
            {!! Form::select('colecao', Colecao::orderBy('nome')->pluck('nome', 'id')->toArray(), $livro->colecao_id, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('editora', 'Editora: ') !!}
            {!! Form::number('editora', Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), $livro->editora_id, ['class'=>'form-control', 'required']) !!}
        </div>
    {!! Form::close() !!}
@stop