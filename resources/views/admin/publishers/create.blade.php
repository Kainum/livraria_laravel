@extends('master_admin', [
    'model_title' => 'Editoras',
    'page_title' => 'Criar Editora',
    ])
@section('content')
    <h2>Nova Editora</h2>

    <form action="{{ route('admin.editoras.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required maxlength="100">
            @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{ route('admin.editoras.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop