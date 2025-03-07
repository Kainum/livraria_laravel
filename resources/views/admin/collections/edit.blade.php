@extends('layouts.admin_layout', [
    'model_title' => 'Coleções',
    'page_title' => 'Editar Coleção',
])
@section('content')
    <h2>Editando Coleção {{ $item->name }}</h2>

    <form action="{{ route('admin.collections.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">

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
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" required maxlength="100"
                value="{{ old('slug', $item->slug) }}">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <hr class="mb-3">

        <h4>Gêneros</h4>

        <div class="input_fields_wrap mb-3">
            @foreach ($item->genres as $genre)
                <div class="mb-3 d-flex align-items-center">
                    <div class="w-75">
                        <select name="genres[]" class="form-select" required placeholder="Selecione um gênero">
                            @foreach (\App\Models\Genre::orderBy('name')->pluck('name', 'id')->toArray() as $id => $name)
                                <option value="{{ $id }}" {{ $genre->id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="remove_field btn btn-danger btn-circle ms-3">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            @endforeach
        </div>

        <div class="d-grid">
            <button type="button" class="add_field_button btn btn-info">Adicionar Gênero</button>
        </div>

        <hr>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.collections.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;
            $(add_button).click(function(e) {
                x++;
                var newField = `<div class="mb-3 d-flex align-items-center">
                                    <div class="w-75">
                                        <select name="genres[]" class="form-select" required placeholder="Selecione um gênero">
                                            @foreach (\App\Models\Genre::orderBy('name')->pluck('name', 'id')->toArray() as $id => $name)
                                                <option value="{{ \Crypt::encrypt($id) }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="remove_field btn btn-danger btn-circle ms-3">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>`;
                $(wrapper).append(newField);
            });
            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
    </script>
@stop
