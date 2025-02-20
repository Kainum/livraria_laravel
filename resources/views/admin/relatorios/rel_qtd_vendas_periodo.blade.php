@extends('layouts.admin_layout', [
    'model_title' => 'Relatórios',
    'page_title' => 'Relatório Quantidade de Vendas por Período',
])
@section('content')
    <h2>Relatório Quantidade de Vendas por Período</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.relatorios.vendas_periodo.gerar') }}" method="post" class="w-50">
        @csrf
        <div class="form-group">
            <label for="dataInicio">Período Inicial:</label>
            <input type="date" name="dataInicio" id="dataInicio" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="dataFim">Período Final:</label>
            <input type="date" name="dataFim" id="dataFim" class="form-control" required value="{{ date('Y-m-d') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Gerar</button>
        </div>
    </form>
@stop
