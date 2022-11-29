@extends('layouts.default', [
    'model_title' => 'Dashboard',
    'page_title' => 'Dashboard Admin',
    'search_route' => 'admin.livros',
    ])
@section('content')
    <div class="row">
        <a class="col-md-6 col-12" href="{{ route('admin.livros') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(17, 75, 95); height:100px">
                <center>
                    <i class="fa-solid fa-pencil" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">LIVROS</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.colecoes') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(2, 128, 144); height:100px">
                <center>
                    <i class="fa-solid fa-pencil" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">COLEÇÕES</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.generos') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(190, 110, 70); height:100px">
                <center>
                    <i class="fa-solid fa-pencil" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">GÊNEROS</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('admin.editoras') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(255, 200, 87); height:100px">
                <center>
                    <i class="fa-solid fa-pencil" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">EDITORAS</span>
                </center>
            </div>
        </a>
        <hr/>
        <a class="col-md-6 col-12" href="{{ route('relatorios.estoque.page') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(175, 27, 63); height:100px">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">QTD. ESTOQUE</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="{{ route('relatorios.vendas_periodo.page') }}">
            <div class="row align-items-center m-1" style="background-color: rgb(71, 49, 68); height:100px">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">MAIS VENDIDOS</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="">
            <div class="row align-items-center m-1" style="background-color: rgb(91, 195, 235); height:100px">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">RELATÓRIO</span>
                </center>
            </div>
        </a>
        <a class="col-md-6 col-12" href="">
            <div class="row align-items-center m-1" style="background-color: rgb(14, 107, 168); height:100px">
                <center>
                    <i class="fa-solid fa-square-poll-horizontal" style="font-size:30px; color: white"></i>
                    <span style="font-size:30px; color: white">RELATÓRIO</span>
                </center>
            </div>
        </a>
    </div>
@stop