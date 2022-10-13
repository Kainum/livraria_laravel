@extends('master_admin', [
    'model_title' => 'Livros',
    'page_title' => 'Editar Livro',
    ])
@section('content')
    <h2>Editando Livro {{ $livro->titulo }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["admin.livros.update", 'files'=>true, 'id'=>$livro->id],'method'=>'put']) !!}
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
            {!! Form::text('imagem', $livro->imagem, ['class'=>'form-control', 'required', 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Arquivo de imagem: ') !!}
            {!! Form::file('file', null, ['class'=>'form-control', 'required']) !!}
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
            {!! Form::label('colecao_id', 'Coleção: ') !!}
            {!! Form::select('colecao_id', \App\Models\Colecao::orderBy('nome')->pluck('nome', 'id')->toArray(), $livro->colecao_id, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('editora_id', 'Editora: ') !!}
            {!! Form::select('editora_id', \App\Models\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), $livro->editora_id, ['class'=>'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@stop