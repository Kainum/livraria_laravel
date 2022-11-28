@extends('master_admin', [
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

    {{ Form::open(['route'=>'relatorios.vendas_periodo.gerar']) }}
    @csrf
        <div class="form-group">
            {{ Form::label('dataInicio', 'Período Inicial: ') }}
            {{ Form::date('dataInicio', null, ['class'=>'form-control', 'required']) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('dataFim', 'Período Final: ') }}
            {{ Form::date('dataFim', date('Y-m-d'), ['class'=>'form-control', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Gerar', ['class'=>'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop