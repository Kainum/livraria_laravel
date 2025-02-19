@extends('layouts.default', [
    'model_title' => 'Gêneros',
    'page_title' => 'Listar Gêneros',
    'search_route' => 'admin.generos.index',
])
@section('content')
    <a href="{{ route('admin.generos.create') }}" class="btn btn-info">Adicionar</a>

    <x-admin-search-bar route="admin.generos.index" />
    
    <table class="table table-bordered table-nowrap mb-3">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Link Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
                <tr>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->imagem }}</td>
                    <td>
                        <a href="{{ route('admin.generos.edit', ['id' => \Crypt::encrypt($item->id)]) }}"
                            class="btn btn-success btn-sm">Editar</a>
                        <a href="{{ route('admin.generos.destroy', ['id' => \Crypt::encrypt($item->id)]) }}"
                            class="btn btn-danger btn-sm delete-confirm">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}
@stop
