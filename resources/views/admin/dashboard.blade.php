@extends('layouts.admin_layout', [
    'model_title' => 'Dashboard',
    'page_title' => 'Dashboard Admin',
])
@section('content')
    <div class="text-white display-4">

        <div class="row mb-3 gap-3">
            <a class="col text-center py-3" href="{{ route('admin.books.index') }}"
                style="background-color: rgb(17, 75, 95);">
                <i class="fa-solid fa-pencil"></i>
                <span>LIVROS</span>
            </a>
    
            <a class="col text-center py-3" href="{{ route('admin.collections.index') }}"
                style="background-color: rgb(2, 128, 144);">
                <i class="fa-solid fa-pencil"></i>
                <span>COLEÇÕES</span>
            </a>
        </div>

        <div class="row mb-3 gap-3">
            <a class="col text-center py-3" href="{{ route('admin.genres.index') }}"
                style="background-color: rgb(190, 110, 70);">
                <i class="fa-solid fa-pencil"></i>
                <span>GÊNEROS</span>
            </a>
    
            <a class="col text-center py-3" href="{{ route('admin.publishers.index') }}"
                style="background-color: rgb(255, 200, 87);">
                <i class="fa-solid fa-pencil"></i>
                <span>EDITORAS</span>
            </a>
        </div>

        <hr class="mb-3 text-black">

        <div class="row mb-3 gap-3">
            <a class="col text-center py-3" href="{{ route('admin.relatorios.estoque.page') }}"
                style="background-color: rgb(175, 27, 63);">
                <i class="fa-solid fa-square-poll-horizontal"></i>
                <span>QTD. ESTOQUE</span>
            </a>
    
            <a class="col text-center py-3" href="{{ route('admin.relatorios.vendas_periodo.page') }}"
                style="background-color: rgb(71, 49, 68);">
                <i class="fa-solid fa-square-poll-horizontal"></i>
                <span>MAIS VENDIDOS</span>
            </a>
        </div>

    </div>
@endsection
