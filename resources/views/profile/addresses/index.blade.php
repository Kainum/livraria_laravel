@extends('layouts.default_loja', [
    'model_title'   => 'Endereços',
    'page_title'    => 'Meus Endereços',
])
@section('content')
    @if (!$item_list->isEmpty())
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
                        <a href="{{ route('profile.addresses.edit',     ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-success">Editar</a>
                        <a href="{{ route('profile.addresses.destroy',  ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-danger delete-confirm">Remover</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você não possui endereços cadastrados</p>
    @endif

    <a href="{{ route('profile.addresses.create', []) }}" class="btn btn-info">Novo Endereço</a>
@stop
