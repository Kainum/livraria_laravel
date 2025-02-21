@extends('layouts.admin_layout', [
    'model_title' => 'Livros',
    'page_title' => 'Criar Book',
    'search_route' => 'admin.books.index',
    ])
@section('content')
    <h2>Novo Book</h2>

    <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">

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
            <label for="image">Arquivo de Imagem:</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
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
            <label for="collection_id">Coleção:</label>
            <select name="collection_id" id="collection_id" class="form-select" required>
                @foreach(\App\Models\Collection::orderBy('name')->get() as $colecao)
                    <option value="{{ $colecao->id }}">{{ $colecao->name }}</option>
                @endforeach
            </select>
            @error('collection_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="publisher_id">Publisher:</label>
            <select name="publisher_id" id="publisher_id" class="form-select" required>
                @foreach(\App\Models\Publisher::orderBy('name')->get() as $editora)
                    <option value="{{ $editora->id }}">{{ $editora->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-default">Voltar</a>
        </div>

    </form>
@stop