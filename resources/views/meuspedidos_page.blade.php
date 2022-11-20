@extends('master', [
    'model_title'   => 'Meus Pedidos',
    'page_title'    => 'Meus Pedidos',
])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div class="row">
        @foreach ($item_list as $pedido)
            <div class="table-responsive mb-3">
                @switch($pedido->status)
                    @case(app\Models\Pedido::STATUS_ABERTO)
                        <table class="table table-success table-bordered align-middle">
                        @break
                    @case(app\Models\Pedido::STATUS_CANCELADO)
                        <table class="table table-danger table-bordered align-middle">
                        @break
                    @default
                        <table class="table table-bordered align-middle">
                @endswitch
                    <thead>
                        <tr>
                            <th class="rounded-start">Endereço</th>
                            <th class="">Status</th>
                            <th class="">Data do Pedido</th>
                            <th class="">Valor Total</th>
                            <th class="">Frete</th>
                            <th class="rounded-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ print($pedido->endereco) }}</td>
                            @switch($pedido->status)
                                @case(app\Models\Pedido::STATUS_ABERTO)
                                    <td style="color: green">ABERTO</td>
                                    @break
                                @case(app\Models\Pedido::STATUS_CANCELADO)
                                    <td style="color: firebrick">CANCELADO</td>
                                    @break
                                @default
                                    <td></td>
                            @endswitch
                            <td>{{ Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y') }}</td>
                            <td>R${{ \App\Util::formataDinheiro($pedido->valorTotal) }}</td>
                            <td>R${{ \App\Util::formataDinheiro($pedido->valorFrete) }}</td>
                            <td>aa</td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Qtd</th>
                                            <th>Preço Unit.</th>
                                            <th>Valor Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedido->items as $item)
                                            <tr>
                                                <td>{{ $item->produto->titulo }}</td>
                                                <td>{{ $item->qtd }}</td>
                                                <td>R${{ \App\Util::formataDinheiro($item->valor_unitario) }}</td>
                                                <td>R${{ \App\Util::formataDinheiro($item->valor_item) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
    
@stop