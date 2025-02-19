@extends('layouts.default', [
    'model_title' => 'Editoras',
    'page_title' => 'Listar Editoras',
    'search_route' => 'admin.editoras.index',
])
@section('content')
    <a href="{{ route('admin.editoras.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.editoras.index" />

    <table class="table table-bordered table-nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th class="col-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <x-admin-table-actions route="admin.editoras" :$item />
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
