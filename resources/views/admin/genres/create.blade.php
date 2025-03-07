@extends('layouts.admin_layout', [
    'model_title' => 'Gêneros',
    'page_title' => 'Criar Gênero',
    ])
@section('content')
    <h2>Novo Gênero</h2>

    <form action="{{ route('admin.genres.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" required maxlength="50">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="file">Arquivo de Imagem:</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" required maxlength="100">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop