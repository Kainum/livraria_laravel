@extends('layouts.shop', [
    'model_title'   => 'Meu Perfil',
    'page_title'    => 'Meu Perfil',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif
    <div class="">
        <div class="d-flex gap-4 align-items-center mb-3">
            <span>Nome: <b>{{ $user->name }}</b></span>
            <span>E-mail: <b>{{ $user->email }}</b></span>
            <span>CPF: <b>{{ $user->cpf }}</b></span>
        </div>

        <a href="{{ route('profile.addresses.index') }}" class="btn btn-secondary">Meus Endereços</a>

        <hr>

        <div class="d-flex gap-3">
            <x-profile.edit-info :$user />
            <x-profile.edit-password />
        </div>

    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00', {reverse: false});
        });
    </script>
@stop