@extends('master', ['model_title' => 'Loja'])
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
                <td>{{ $item->livro->titulo }}</td>
                <td>
                    {{ $item->data_adicao }}
                </td>
                <td>
                    <a href="{{ route('wishlist.remove', ['id'=>$item->id]) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop