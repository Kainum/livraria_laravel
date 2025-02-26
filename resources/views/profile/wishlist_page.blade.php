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
        <table class="table table-bordered table-nowrap mb-0">
            <thead class="thead-light">
                <tr>
                    <th class="col">Produto</th>
                    <th class="col-2 text-center">Data de Adição</th>
                    <th class="col-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_list as $item)
                    <tr>
                        <td>
                            <a href="{{ route('product.view', ['slug' => $item->book->slug]) }}">
                                {{ $item->book->product_name }}
                            </a>
                        </td>
                        <td class="text-center">{{ Carbon\Carbon::parse($item->added_date)->format('d/m/Y') }}</td>
                        <td class="p-0 text-center">
                            <a href="{{ route('profile.wishlist.remove', ['id' => \Crypt::encrypt($item->id)]) }}"
                                class="btn btn-danger btn-sm">Remover</a>
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
