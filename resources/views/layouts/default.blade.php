@extends('master_admin', [
    'model_title' => $model_title,
    'page_title' => $page_title,
    'search_route' => $search_route,
    ])

@section('js')
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
                                title:  'Deletado!',
                                text:   'Exclusão confirmada',
                                icon:   'success',
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title:  'Erro!',
                                text:   'Ocorreram erros na exclusão. Entre em contato com o suporte.',
                                icon:   'error',
                            });
                        }
                    });
                }
            });
        });
    </script>

@endsection