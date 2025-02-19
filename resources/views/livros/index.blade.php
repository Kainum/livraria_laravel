@extends('layouts.default', [
    'model_title' => 'Livros',
    'page_title' => 'Listar Livros',
    'search_route' => 'admin.livros.index',
    ])
@section('content')
    {{ Form::open(['name'=>'form_name', 'route'=>'admin.livros.index']) }}
        <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-default">
                <i class="fa fa-search"></i>
            </button>
            </span>
        </div>
        </div>
    {{ Form::close() }}
    <br>
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">Título</th>
                <th class="border-0">ISBN</th>
                <th class="border-0">Editora</th>
                <th class="border-0">Coleção</th>
                <th class="border-0 rounded-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->isbn }}</td>
                <td>{{ $item->editora->nome }}</td>
                <td>{{ $item->colecao->nome }}</td>
                <td>
                    <a href="{{ route('admin.livros.edit',     ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('admin.livros.destroy',  ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-danger delete-confirm">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}

    <a href="{{ route('admin.livros.create', []) }}" class="btn btn-info">Adicionar</a>
@stop