@extends('layouts.admin_layout', [
    'model_title' => 'Coleções',
    'page_title' => 'Listar Coleções',
    'search_route' => 'admin.collections.index',
])
@section('content')
    <a href="{{ route('admin.collections.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.collections.index" />

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
                    <td>{{ $item->name }}</td>
                    <td>
                        @foreach ($item->generos as $genre)
                            <li>{{ $genre->name }}</li>
                        @endforeach
                    </td>
                    <x-admin-table-actions route="admin.collections" :$item />
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
