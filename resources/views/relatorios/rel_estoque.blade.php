@extends('master_admin', [
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

    {{ Form::open(['route'=>'relatorios.estoque.gerar']) }}
    @csrf
        <div class="form-group">
            {{ Form::label('maxResults', 'Número Máximo de Resultados: ') }}
            <select class="form-select" required id="maxResults" name="maxResults">
                <option value="10" selected>10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="-1">Todos</option>
            </select>
            
        </div>
        <br>
        <div class="form-group">
            <input class="form-check-input" type="checkbox" id="allZero" name="allZero" value="true">
            <label class="form-check-label" for="allZero">Apenas com estoque = 0? (Zero)</label>
        </div>

        <div class="form-group">
            {{ Form::submit('Gerar', ['class'=>'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop