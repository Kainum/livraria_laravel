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
                    window.location.href = url;
                }
            });
        });
    </script>

@endsection