@extends('layouts.admin_layout', [
    'model_title' => 'Editoras',
    'page_title' => 'Editar Publisher',
])
@section('content')
    <h2>Editando Publisher {{ $item->name }}</h2>

    <form action="{{ route('admin.publishers.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post">

        @csrf

        <div class="form-group mb-3">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" required maxlength="100"
                value="{{ old('name', $item->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.publishers.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop
