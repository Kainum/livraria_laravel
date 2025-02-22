@extends('layouts.shop', [
    'model_title'   => 'Meus Pedidos',
    'page_title'    => 'Meus Pedidos',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif
    <div class="row">
        @foreach ($item_list as $pedido)
            <div class="table-responsive mb-3">
                @switch($pedido->status)
                    @case(app\Enums\OrderStatusEnum::PAID)
                        <table class="table table-success table-bordered align-middle">
                        @break
                    @case(app\Enums\OrderStatusEnum::CANCELED)
                        <table class="table table-danger table-bordered align-middle">
                        @break
                    @default
                        <table class="table table-bordered align-middle">
                @endswitch
                    <thead>
                        <tr>
                            <th class="rounded-start">Endereço</th>
                            <th class="">Status</th>
                            <th class="">Data do Order</th>
                            <th class="">Valor Total</th>
                            <th class="">Frete</th>
                            <th class="rounded-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ substr(print($pedido->endereco), 0, -1) }}</td>
                            @switch($pedido->status)
                                @case(app\Enums\OrderStatusEnum::PAID)
                                    <td style="color: green">ABERTO</td>
                                    @break
                                @case(app\Enums\OrderStatusEnum::CANCELED)
                                    <td style="color: firebrick">CANCELADO</td>
                                    @break
                                @default
                                    <td></td>
                            @endswitch
                            <td>{{ Carbon\Carbon::parse($pedido->order_date)->format('d/m/Y') }}</td>
                            <td>{{ \App\Services\Operations::money($pedido->total_value) }}</td>
                            <td>{{ \App\Services\Operations::money($pedido->valorFrete) }}</td>
                            <td>
                                @switch($pedido->status)
                                    @case(app\Enums\OrderStatusEnum::PAID)
                                        <a href="{{ route('profile.orders.cancel',  ['id'=>\Crypt::encrypt($pedido->id)]) }}" class="btn btn-danger delete-confirm">Cancelar Order</a>
                                        @break
                                    @case(app\Enums\OrderStatusEnum::CANCELED)
                                        <button disabled class="btn btn-danger">Cancelar Order</button>
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
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                <td>{{ \App\Services\Operations::money($item->pivot->unit_value) }}</td>
                                                <td>{{ \App\Services\Operations::money($item->pivot->item_value) }}</td>
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
                                text:   'Order Cancelado!',
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