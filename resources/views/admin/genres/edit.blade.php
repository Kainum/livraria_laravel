@extends('layouts.admin_layout', [
    'model_title' => 'Gêneros',
    'page_title' => 'Editar Gênero',
])
@section('content')
    <h2>Editando Gênero {{ $item->name }}</h2>

    <form action="{{ route('admin.genres.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" required maxlength="50"
                value="{{ old('name', $item->name) }}">
            @error('name')
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
            <input type="text" name="image" id="image" class="form-control" required maxlength="250" disabled
                value="{{ $item->image }}">
        </div>

        <div class="form-group mb-3">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" required maxlength="100"
                value="{{ old('slug', $item->slug) }}">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop
