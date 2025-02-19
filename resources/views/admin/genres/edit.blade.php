@extends('layouts.admin_layout', [
    'model_title' => 'Gêneros',
    'page_title' => 'Editar Gênero',
])
@section('content')
    <h2>Editando Gênero {{ $item->nome }}</h2>

    <form action="{{ route('admin.genres.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required maxlength="50"
                value="{{ old('nome', $item->nome) }}">
            @error('nome')
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
            <input type="text" name="imagem" id="imagem" class="form-control" required maxlength="250" disabled
                value="{{ $item->imagem }}">
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop
