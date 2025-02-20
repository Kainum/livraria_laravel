@extends('layouts.admin_layout', [
    'model_title' => 'Relatórios',
    'page_title' => 'Relatório Estoque dos Produtos',
])
@section('content')
    <h2>Relatório Estoque dos Produtos</h2>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.relatorios.estoque.gerar') }}" method="post" class="w-50">

        @csrf
        <div class="form-group mb-3">
            <label for="maxResults">Número Máximo de Resultados:</label>
            <select class="form-select" id="maxResults" name="maxResults" required>
                @foreach ([10, 50, 100, 500] as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
                <option value="-1">Todos</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <input class="form-check-input" type="checkbox" id="allZero" name="allZero">
            <label class="form-check-label" for="allZero">Apenas produtos fora de estoque</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Gerar</button>
        </div>
    </form>
@stop
