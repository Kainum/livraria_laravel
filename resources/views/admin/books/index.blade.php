@extends('layouts.admin_layout', [
    'model_title' => 'Livros',
    'page_title' => 'Listar Livros',
    'search_route' => 'admin.books.index',
])
@section('content')
    <a href="{{ route('admin.books.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.books.index" />

    <table class="table table-bordered table-nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <th>Título</th>
                <th>ISBN</th>
                <th>Editora</th>
                <th>Coleção</th>
                <th class="col-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
                <tr>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->editora->nome }}</td>
                    <td>{{ $item->colecao->nome }}</td>
                    <x-admin-table-actions route="admin.books" :$item />
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
