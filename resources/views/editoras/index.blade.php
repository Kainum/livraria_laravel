@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h1>Editoras</h1>
    <table class=""></table>
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
                    <a href="{{ route('admin.editoras.edit',     ['id'=>$item->id]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('admin.editoras.destroy',  ['id'=>$item->id]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $item_list->links() }}

    <a href="{{ route('admin.editoras.create', []) }}" class="btn btn-info">Adicionar</a>
@stop