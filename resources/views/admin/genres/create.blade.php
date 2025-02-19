@extends('master_admin', [
    'model_title' => 'Gêneros',
    'page_title' => 'Criar Gênero',
    ])
@section('content')
    <h2>Novo Gênero</h2>

    <form action="{{ route('admin.generos.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required maxlength="50">
            @error('nome')
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
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.generos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop