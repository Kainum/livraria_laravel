@extends('layouts.default', [
    'model_title' => 'Livros',
    'page_title' => 'Criar Livro',
    'search_route' => 'admin.livros.index',
    ])
@section('content')
    <h2>Novo Livro</h2>

    <form action="{{ route('admin.livros.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required maxlength="100">
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" required maxlength="20">
            @error('isbn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" class="form-control" required maxlength="100">
            @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="imagem">Arquivo de Imagem:</label>
            <input type="file" name="imagem" id="imagem" class="form-control">
            @error('imagem')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="resumo">Resumo:</label>
            <textarea name="resumo" id="resumo" class="form-control" required maxlength="1000"></textarea>
            @error('resumo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="data_lancamento">Data de Lançamento:</label>
            <input type="date" name="data_lancamento" id="data_lancamento" class="form-control" required>
            @error('data_lancamento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" class="form-control money2" required min="0" step="0.01">
            @error('preco')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="paginas">Nº de Páginas:</label>
            <input type="number" name="paginas" id="paginas" class="form-control" required min="1">
            @error('paginas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="qtd_estoque">Estoque Atual:</label>
            <input type="number" name="qtd_estoque" id="qtd_estoque" class="form-control" required min="0">
            @error('qtd_estoque')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="colecao_id">Coleção:</label>
            <select name="colecao_id" id="colecao_id" class="form-select" required>
                @foreach(\App\Models\Colecao::orderBy('nome')->get() as $colecao)
                    <option value="{{ $colecao->id }}">{{ $colecao->nome }}</option>
                @endforeach
            </select>
            @error('colecao_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="editora_id">Editora:</label>
            <select name="editora_id" id="editora_id" class="form-select" required>
                @foreach(\App\Models\Editora::orderBy('nome')->get() as $editora)
                    <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                @endforeach
            </select>
            @error('editora_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.livros.index') }}" class="btn btn-default">Voltar</a>
        </div>

    </form>
@stop