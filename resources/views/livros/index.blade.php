@extends('master_admin', ['model_title' => 'Livros'])
@section('content')
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
                    <a href="{{ route('admin.livros.edit',     ['id'=>$item->id]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('admin.livros.destroy',  ['id'=>$item->id]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}

    <a href="{{ route('admin.livros.create', []) }}" class="btn btn-info">Adicionar</a>
@stop