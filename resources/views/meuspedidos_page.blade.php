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
                            <td>
                                @switch($pedido->status)
                                    @case(app\Models\Pedido::STATUS_ABERTO)
                                        <a href="{{ route('pedido.cancelar',  ['id'=>\Crypt::encrypt($pedido->id)]) }}" class="btn btn-danger delete-confirm">Cancelar Pedido</a>
                                        @break
                                    @case(app\Models\Pedido::STATUS_CANCELADO)
                                        <button disabled class="btn btn-danger">Cancelar Pedido</button>
                                        @break
                                    @default
                                        <td></td>
                                @endswitch
                            </td>
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

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title:  'Você tem certeza?',
                text:   'O pedido será cancelado!',
                icon:   'warning',
                buttons: ["Cancelar", "Sim!"],
            }).then(function(value) {
                if (value) {
                    $.get(url, function(data) {
                        if (data.status == 200) {
                            swal({
                                title:  'Tudo ok',
                                text:   'Pedido Cancelado!',
                                icon:   'success',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title:  'Erro!',
                                text:   'Não foi possível cancelar o pedido. Entre em contato com o suporte.',
                                icon:   'error',
                            });
                        }
                    });
                }
            });
        });

        
    </script>

@endsection