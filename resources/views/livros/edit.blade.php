@extends('master_admin', [
    'model_title' => 'Livros',
    'page_title' => 'Editar Livro',
    ])
@section('content')
    <h2>Editando Livro {{ $item->titulo }}</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(['route'=>["admin.livros.update", 'id'=>\Crypt::encrypt($item->id)], 'method'=>'put', 'files'=>true,]) }}
        <div class="form-group">
            {{ Form::label('titulo', 'Título: ') }}
            {{ Form::text('titulo', $item->titulo, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>
        <div class="form-group">
            {{ Form::label('isbn', 'ISBN: ') }}
            {{ Form::text('isbn', $item->isbn, ['class'=>'form-control', 'required', 'maxlength'=>20]) }}
        </div>
        <div class="form-group">
            {{ Form::label('autor', 'Autor: ') }}
            {{ Form::text('autor', $item->autor, ['class'=>'form-control', 'required', 'maxlength'=>100]) }}
        </div>
        <div class="form-group">
            {{ Form::label('file', 'Alterar arquivo de imagem: ') }}
            {{ Form::file('file', null, ['class'=>'form-control',]) }}
        </div>
        <div class="form-group">
            {{ Form::label('imagem', 'Arquivo da imagem: ') }}
            {{ Form::text('imagem', $item->imagem, ['class'=>'form-control', 'disabled']) }}
        </div>
        <div class="form-group">
            {{ Form::label('resumo', 'Resumo: ') }}
            {{ Form::textarea('resumo', $item->resumo, ['class'=>'form-control', 'required', 'maxlength'=>1000]) }}
        </div>
        <div class="form-group">
            {{ Form::label('data_lancamento', 'Data de Lançamento: ') }}
            {{ Form::date('data_lancamento', $item->data_lancamento, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('preco', 'Preço: ') }}
            {{ Form::number('preco', $item->preco, ['class'=>'form-control', 'required', 'min'=>0, 'step'=>0.01]) }}
        </div>
        <div class="form-group">
            {{ Form::label('paginas', 'Nº de Páginas: ') }}
            {{ Form::number('paginas', $item->paginas, ['class'=>'form-control', 'required', 'min'=>1]) }}
        </div>
        <div class="form-group">
            {{ Form::label('qtd_estoque', 'Estoque atual: ') }}
            {{ Form::number('qtd_estoque', $item->qtd_estoque, ['class'=>'form-control', 'required', 'min'=>0]) }}
        </div>
        <div class="form-group">
            {{ Form::label('colecao_id', 'Coleção: ') }}
            {{ Form::select('colecao_id', \App\Models\Colecao::orderBy('nome')->pluck('nome', 'id')->toArray(), $item->colecao_id, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('editora_id', 'Editora: ') }}
            {{ Form::select('editora_id', \App\Models\Editora::orderBy('nome')->pluck('nome', 'id')->toArray(), $item->editora_id, ['class'=>'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Salvar', ['class'=>'btn btn-primary']) }}
            {{ Form::reset('Limpar', ['class'=>'btn btn-default']) }}
        </div>
    {{ Form::close() }}
@stop