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
            <label for="product_name">Título:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required maxlength="100">
            @error('product_name')
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
            <label for="author">Autor:</label>
            <input type="text" name="author" id="author" class="form-control" required maxlength="100">
            @error('author')
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
            <label for="synopsis">Resumo:</label>
            <textarea name="synopsis" id="synopsis" class="form-control" required maxlength="1000"></textarea>
            @error('synopsis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="release_date">Data de Lançamento:</label>
            <input type="date" name="release_date" id="release_date" class="form-control" required>
            @error('release_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" class="form-control money2" required min="0" step="0.01">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="page_number">Nº de Páginas:</label>
            <input type="number" name="page_number" id="page_number" class="form-control" required min="1">
            @error('page_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="qty_in_stock">Estoque Atual:</label>
            <input type="number" name="qty_in_stock" id="qty_in_stock" class="form-control" required min="0">
            @error('qty_in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="collection_id">Coleção:</label>
            <select name="collection_id" id="collection_id" class="form-select" required>
                @foreach(\App\Models\Collection::orderBy('name')->get() as $collection)
                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                @endforeach
            </select>
            @error('collection_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="publisher_id">Publisher:</label>
            <select name="publisher_id" id="publisher_id" class="form-select" required>
                @foreach(\App\Models\Publisher::orderBy('name')->get() as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" required maxlength="200">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-default">Voltar</a>
        </div>

    </form>
@stop