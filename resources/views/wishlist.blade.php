@extends('master', [
    'model_title'   => 'Loja',
    'page_title'    => 'Lista de Desejos',
])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">Produto</th>
                <th class="border-0">Data de Adição</th>
                <th class="border-0 rounded-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>
                    <a href="{{ route('produto.view', ['id'=>\Crypt::encrypt($item->livro->id)]) }}">
                        {{ $item->livro->titulo }}
                    </a>
                </td>
                <td>
                    {{ Carbon\Carbon::parse($item->data_adicao)->format('d/m/Y') }}
                </td>
                <td>
                    <a href="{{ route('wishlist.remove', ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop