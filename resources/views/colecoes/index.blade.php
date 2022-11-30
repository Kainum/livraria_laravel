@extends('layouts.default', [
    'model_title' => 'Coleções',
    'page_title' => 'Listar Coleções',
    'search_route' => 'admin.colecoes',
    ])
@section('content')
    {{ Form::open(['name'=>'form_name', 'route'=>'admin.colecoes']) }}
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
                <th class="border-0 rounded-start">Nome</th>
                <th class="border-0">Gêneros</th>
                <th class="border-0 rounded-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>
                    @foreach ($item->generos as $gen)
                        <li>{{ $gen->genero->nome }}</li>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.colecoes.edit',     ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('admin.colecoes.destroy',  ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-danger delete-confirm">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}

    <a href="{{ route('admin.colecoes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop