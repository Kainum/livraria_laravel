@extends('master_admin', [
    'model_title' => 'Coleções',
    'page_title' => 'Editar Coleção',
])
@section('content')
    <h2>Editando Coleção {{ $item->nome }}</h2>

    <form action="{{ route('admin.colecoes.update', ['id' => \Crypt::encrypt($item->id)]) }}" method="post"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required maxlength="100"
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
            <input type="text" name="imagem" id="imagem" class="form-control" required maxlength="50" disabled
                value="{{ $item->imagem }}">
        </div>

        <hr class="mb-3">

        <h4>Gêneros</h4>

        <div class="input_fields_wrap mb-3">
            @foreach ($item->generos as $gen)
                <div class="mb-3 d-flex align-items-center">
                    <div class="w-75">
                        <select name="generos[]" class="form-select" required placeholder="Selecione um gênero">
                            @foreach (\App\Models\Genero::orderBy('nome')->pluck('nome', 'id')->toArray() as $id => $nome)
                                <option value="{{ $id }}" {{ $gen->genero_id == $id ? 'selected' : '' }}>{{ $nome }}</option>
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
            <a href="{{ route('admin.colecoes.index') }}" class="btn btn-default">Voltar</a>
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
                                        <select name="generos[]" class="form-select" required placeholder="Selecione um gênero">
                                            @foreach (\App\Models\Genero::orderBy('nome')->pluck('nome', 'id')->toArray() as $id => $nome)
                                                <option value="{{ $id }}">{{ $nome }}</option>
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
