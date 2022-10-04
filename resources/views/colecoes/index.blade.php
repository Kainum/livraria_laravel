@extends('master_admin', ['model_title' => 'Coleções'])
@section('content')
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">#</th>
                <th class="border-0">Nome</th>
                <th class="border-0 rounded-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>
                    <a href="{{ route('admin.colecoes.edit',     ['id'=>$item->id]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('admin.colecoes.destroy',  ['id'=>$item->id]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}

    <a href="{{ route('admin.colecoes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop