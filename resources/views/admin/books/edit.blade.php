@extends('layouts.admin_layout', [
    'model_title' => 'Livros',
    'page_title' => 'Editar Book',
    'search_route' => 'admin.books.index',
])
@section('content')
    <h2>Editando Book {{ $item->titulo }}</h2>

    <form action="{{ route('admin.books.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required maxlength="100"
                value="{{ old('titulo', $item->titulo) }}">
            @error('titulo')
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
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" class="form-control" required maxlength="100"
                value="{{ old('autor', $item->autor) }}">
            @error('autor')
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
            <label for="imagem">Arquivo da imagem:</label>
            <input type="text" name="imagem" id="imagem" class="form-control" required maxlength="255" disabled
                value="{{ $item->imagem }}">
        </div>

        <div class="form-group mb-3">
            <label for="resumo">Resumo:</label>
            <textarea name="resumo" id="resumo" class="form-control" required maxlength="1000">{{ old('resumo', $item->resumo) }}</textarea>
            @error('resumo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="data_lancamento">Data de Lançamento:</label>
            <input type="date" name="data_lancamento" id="data_lancamento" class="form-control" required
                value="{{ old('data_lancamento', $item->data_lancamento) }}">
            @error('data_lancamento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" id="preco" class="form-control money2" required min="0"
                step="0.01" value="{{ old('preco', $item->preco) }}">
            @error('preco')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="paginas">Nº de Páginas:</label>
            <input type="number" name="paginas" id="paginas" class="form-control" required min="1"
                value="{{ old('paginas', $item->paginas) }}">
            @error('paginas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="qtd_estoque">Estoque Atual:</label>
            <input type="number" name="qtd_estoque" id="qtd_estoque" class="form-control" required min="0"
                value="{{ old('qtd_estoque', $item->qtd_estoque) }}">
            @error('qtd_estoque')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="colecao_id">Coleção:</label>
            <select name="colecao_id" id="colecao_id" class="form-select" required>
                @foreach (\App\Models\Collection::orderBy('nome')->get() as $colecao)
                    <option value="{{ $colecao->id }}" {{ $colecao->id == $item->colecao_id ? 'selected' : '' }}>
                        {{ $colecao->nome }}</option>
                @endforeach
            </select>
            @error('colecao_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="editora_id">Publisher:</label>
            <select name="editora_id" id="editora_id" class="form-select" required>
                @foreach (\App\Models\Publisher::orderBy('nome')->get() as $editora)
                    <option value="{{ $editora->id }}" {{ $editora->id == $item->editora_id ? 'selected' : '' }}>
                        {{ $editora->nome }}</option>
                @endforeach
            </select>
            @error('editora_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-default">Voltar</a>
        </div>

    </form>
@stop
