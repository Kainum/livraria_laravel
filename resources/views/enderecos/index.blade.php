@extends('master', [
    'model_title'   => 'Endereços',
    'page_title'    => 'Meus Endereços',
])
@section('content')
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">Endereço</th>
                <th class="border-0 rounded-end">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>
                    <p>{{ ($item->endereco.", ".$item->numero." - ".$item->bairro) }}</p>
                    <p>{{ ($item->cidade.", ".$item->uf." - ".$item->cep) }}</p>
                </td>
                <td>
                    <a href="{{ route('enderecos.edit',     ['id'=>$item->id]) }}" class="btn btn-success">Editar</a>
                    <a href="{{ route('enderecos.destroy',  ['id'=>$item->id]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('enderecos.create', []) }}" class="btn btn-info">Novo Endereço</a>
@stop