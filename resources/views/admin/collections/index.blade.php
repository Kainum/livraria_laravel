@extends('layouts.default', [
    'model_title' => 'Coleções',
    'page_title' => 'Listar Coleções',
    'search_route' => 'admin.colecoes.index',
])
@section('content')
    <a href="{{ route('admin.colecoes.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.colecoes.index" />

    <table class="table table-bordered table-nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Gêneros</th>
                <th class="col-2">Ações</th>
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
                    <x-admin-table-actions route="admin.colecoes" :$item />
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
