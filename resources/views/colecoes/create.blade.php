@extends('master_admin', [
    'model_title' => 'Coleções',
    'page_title' => 'Criar Coleção',
    ])
@section('content')
    <h2>Nova Coleção</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>'admin.colecoes.store', 'files'=>true]) }}
        <div class="form-group">
            {{ Form::label('nome', 'Nome: ') }}
            {{ Form::text('nome', null, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Arquivo de imagem: ') }}
            {{ Form::file('file', null, ['class'=>'form-control']) }}
        </div>
        <hr/>

        <h4>Gêneros</h4>
        <div class="input_fields_wrap"></div>
        <br>

        <button type="button" style="float: right" class="add_field_button btn btn-default">Adicionar Gênero</button>

        <br>
        <hr/>

        <div class="form-group">
            {{ Form::submit('Criar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;
            $(add_button).click(function(e){
                x++;
                var newField = '<div><div style="width:94%; float:left" id="genero">{{ Form::select("generos[]", \App\Models\Genero::orderBy("nome")->pluck("nome","id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um gênero"]) }}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });
    </script>
@stop