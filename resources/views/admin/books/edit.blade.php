@extends('layouts.admin_layout', [
    'model_title' => 'Livros',
    'page_title' => 'Editar Book',
    'search_route' => 'admin.books.index',
])
@section('content')
    <h2>Editando Book {{ $item->product_name }}</h2>

    <form action="{{ route('admin.books.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="product_name">Título:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required maxlength="100"
                value="{{ old('product_name', $item->product_name) }}">
            @error('product_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="form-control" required maxlength="20"
                value="{{ old('isbn', $item->isbn) }}">
            @error('isbn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="author">Autor:</label>
            <input type="text" name="author" id="author" class="form-control" required maxlength="100"
                value="{{ old('author', $item->author) }}">
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="file">Alterar Arquivo de Imagem:</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Arquivo da image:</label>
            <input type="text" name="image" id="image" class="form-control" required maxlength="255" disabled
                value="{{ $item->image }}">
        </div>

        <div class="form-group mb-3">
            <label for="synopsis">Resumo:</label>
            <textarea name="synopsis" id="synopsis" class="form-control" required maxlength="1000">{{ old('synopsis', $item->synopsis) }}</textarea>
            @error('synopsis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="release_date">Data de Lançamento:</label>
            <input type="date" name="release_date" id="release_date" class="form-control" required
                value="{{ old('release_date', $item->release_date) }}">
            @error('release_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" class="form-control money2" required min="0"
                step="0.01" value="{{ old('price', $item->price) }}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="page_number">Nº de Páginas:</label>
            <input type="number" name="page_number" id="page_number" class="form-control" required min="1"
                value="{{ old('page_number', $item->page_number) }}">
            @error('page_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="qty_in_stock">Estoque Atual:</label>
            <input type="number" name="qty_in_stock" id="qty_in_stock" class="form-control" required min="0"
                value="{{ old('qty_in_stock', $item->qty_in_stock) }}">
            @error('qty_in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="collection_id">Coleção:</label>
            <select name="collection_id" id="collection_id" class="form-select" required>
                @foreach (\App\Models\Collection::orderBy('name')->get() as $collection)
                    <option value="{{ $collection->id }}" {{ $collection->id == $item->collection_id ? 'selected' : '' }}>
                        {{ $collection->name }}</option>
                @endforeach
            </select>
            @error('collection_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="publisher_id">Publisher:</label>
            <select name="publisher_id" id="publisher_id" class="form-select" required>
                @foreach (\App\Models\Publisher::orderBy('name')->get() as $publisher)
                    <option value="{{ $publisher->id }}" {{ $publisher->id == $item->publisher_id ? 'selected' : '' }}>
                        {{ $publisher->name }}</option>
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
