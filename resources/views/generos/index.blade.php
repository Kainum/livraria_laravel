@extends('master', ['model_title' => 'Layout'])
@section('content')
    <h1>Gêneros</h1>
    <table class=""></table>
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">#</th>
                <th class="border-0">Nome</th>
                <th class="border-0 rounded-end">Link Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($item_list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->imagem }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop