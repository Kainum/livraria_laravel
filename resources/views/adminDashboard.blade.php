@extends('layouts.default', [
    'model_title' => 'Dashboard',
    'page_title' => 'Dashboard Admin',
    'search_route' => 'admin.livros',
    ])
@section('content')
    <div class="row">
        <a class="col-md-6 col-12" href="{{ route('admin.livros') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(17, 75, 95);">
                <center>
                    <i class="fa-solid fa-pencil text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">LIVROS</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.colecoes') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(2, 128, 144);">
                <center>
                    <i class="fa-solid fa-pencil text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">COLEÇÕES</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.generos') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(190, 110, 70);">
                <center>
                    <i class="fa-solid fa-pencil text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">GÊNEROS</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.editoras') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(255, 200, 87);">
                <center>
                    <i class="fa-solid fa-pencil text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">EDITORAS</span>
                </center>
            </div>
        </a>
        <hr/>
        <a class="col-md-6 col-12" href="{{ route('relatorios.estoque.page') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(175, 27, 63);">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">QTD. ESTOQUE</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('relatorios.vendas_periodo.page') }}">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(71, 49, 68);">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">MAIS VENDIDOS</span>
                </center>
            </div>
        </a>
        {{-- <a class="col-md-6 col-12" href="">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(91, 195, 235);">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">RELATÓRIO</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="">
            <div class="row align-items-center m-1 btn-dashboard" style="background-color: rgb(14, 107, 168);">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal text-btn-dashboard"></i>
                    <span class="text-btn-dashboard">RELATÓRIO</span>
                </center>
            </div>
        </a> --}}
    </div>
@stop

@section('style')
    <style>
        .text-btn-dashboard {
            font-size: 30px;
            color: white;
        }

        .btn-dashboard {
            height: 100px;
        }
    </style>
@endsection