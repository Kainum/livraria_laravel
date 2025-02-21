@extends('layouts.shop', [
    'model_title' => 'Lista de Desejos',
    'page_title' => 'Lista de Desejos',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif

    @if ($item_list->count() > 0)
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
                            <a href="{{ route('produto.view', ['id' => \Crypt::encrypt($item->livro->id)]) }}">
                                {{ $item->livro->product_name }}
                            </a>
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->added_date)->format('d/m/Y') }}
                        </td>
                        <td>
                            <a href="{{ route('wishlist.remove', ['id' => \Crypt::encrypt($item->id)]) }}"
                                class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="py-5 text-center">
            Não há nada na sua lista de desejos.
        </div>
    @endif
@stop
