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
                @php
                    switch ($pedido->status) {
                        case app\Enums\OrderStatusEnum::PAID:
                            $color = 'success';
                            break;
                        case app\Enums\OrderStatusEnum::CANCELED:
                            $color = 'danger';
                            break;
                        default:
                            $color = 'info';
                            break;
                    }
                @endphp
                <table class="table table-bordered align-middle table-{{ $color }}">
                    <thead>
                        <tr>
                            <th class="col">Endereço</th>
                            <th class="col-1 text-center">Status</th>
                            <th class="col-1">Data do Pedido</th>
                            <th class="col-2 text-end">Valor Total</th>
                            <th class="col-1 text-end">Frete</th>
                            <th class="col-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $pedido->endereco !!}</td>
                            @switch($pedido->status)
                                @case(app\Enums\OrderStatusEnum::PAID)
                                    <td class="text-center" style="color: green">ABERTO</td>
                                    @break
                                @case(app\Enums\OrderStatusEnum::CANCELED)
                                    <td class="text-center" style="color: firebrick">CANCELADO</td>
                                    @break
                                @default
                                    <td></td>
                            @endswitch
                            <td>{{ Carbon\Carbon::parse($pedido->order_date)->format('d/m/Y') }}</td>
                            <td class="text-end">{{ \App\Services\Operations::money($pedido->total_value) }}</td>
                            <td class="text-end">{{ \App\Services\Operations::money($pedido->valorFrete) }}</td>
                            <td class="text-center">
                                @switch($pedido->status)
                                    @case(app\Enums\OrderStatusEnum::PAID)
                                        <a href="{{ route('profile.orders.cancel', ['id'=>\Crypt::encrypt($pedido->id)]) }}" class="btn btn-danger delete-confirm">Cancelar Order</a>
                                        @break
                                    @case(app\Enums\OrderStatusEnum::CANCELED)
                                        {{-- sem nada --}}
                                        @break
                                    @default
                                        {{-- sem nada --}}
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col">Produto</th>
                                            <th class="col-1">Qtd</th>
                                            <th class="col-1 text-end">Preço Unit.</th>
                                            <th class="col-1 text-end">Valor Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedido->items as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                <td class="text-end">{{ \App\Services\Operations::money($item->pivot->unit_value) }}</td>
                                                <td class="text-end">{{ \App\Services\Operations::money($item->pivot->item_value) }}</td>
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