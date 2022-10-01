@extends('master', ['model_title' => 'Loja'])
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 mb-4">
            <img src="{{ $item->imagem }}">
        </div>
        <div class="col-12 col-sm-6 mb-4">
            <h2>{{ $item->titulo }}</h2>
            <p>{{ $item->resumo }}</p>
            <h4>R${{ $item->preco }}</h4>
        </div>
        <div class="col-12 col-sm-6 mb-4">
            <h4>Detalhes do Produto</h4>
            <table class="table table-centered table-nowrap mb-0 rounded">
                <tbody>
                    <tr>
                        <td>ISBN</td>
                        <td><b>{{ $item->isbn }}</b></td>
                    </tr>
                    <tr>
                        <td>Autor</td>
                        <td><b>{{ $item->autor }}</b></td>
                    </tr>
                    <tr>
                        <td>Data de Lançamento</td>
                        <td><b>{{ $item->data_lancamento }}</b></td>
                    </tr>
                    <tr>
                        <td>Quantidade de Páginas</td>
                        <td><b>{{ $item->paginas }}</b></td>
                    </tr>
                    <tr>
                        <td>Editora</td>
                        <td><b>{{ $item->editora->nome }}</b></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@stop