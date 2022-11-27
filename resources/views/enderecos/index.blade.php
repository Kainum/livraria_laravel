@extends('layouts.default_loja', [
    'model_title'   => 'Endereços',
    'page_title'    => 'Meus Endereços',
])
@section('content')
    @if (!$item_list->isEmpty())
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">Endereço</th>
                    <th class="border-0 rounded-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item_list as $item)
                <tr>
                    <td>
                        <p>{{ ($item->endereco.", ".$item->numero." - ".$item->bairro) }}</p>
                        <p>{{ ($item->cidade.", ".$item->uf." - ".$item->cep) }}</p>
                    </td>
                    <td>
                        <a href="{{ route('enderecos.edit',     ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-success">Editar</a>
                        <a href="{{ route('enderecos.destroy',  ['id'=>\Crypt::encrypt($item->id)]) }}" class="btn btn-danger delete-confirm">Remover</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você não possui endereços cadastrados</p>
    @endif

    <a href="{{ route('enderecos.create', []) }}" class="btn btn-info">Novo Endereço</a>
@stop

{{-- @section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title:  'Você tem certeza?',
                text:   'Este registro será deletado permanentemente!',
                icon:   'warning',
                buttons: ["Cancelar", "Sim!"],
            }).then(function(value) {
                if (value) {
                    $.get(url, function(data) {
                        if (data.status == 200) {
                            swal({
                                title:  'Tudo ok',
                                text:   'Endereço deletado!',
                                icon:   'success',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title:  'Erro!',
                                text:   'Não foi possível apagar o endereço. Entre em contato com o suporte.',
                                icon:   'error',
                            });
                        }
                    });
                }
            });
        });
    </script>

@endsection --}}