@extends('layouts.default', [
    'model_title' => 'Gêneros',
    'page_title' => 'Listar Gêneros',
    'search_route' => 'admin.genres.index',
])
@section('content')
    <a href="{{ route('admin.genres.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.genres.index" />
    
    <table class="table table-bordered table-nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Link Imagem</th>
                <th class="col-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->imagem }}</td>
                    <x-admin-table-actions route="admin.genres" :$item />
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
