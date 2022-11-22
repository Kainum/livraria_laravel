@extends('master', [
    'model_title'   => 'Meu Perfil',
    'page_title'    => 'Meu Perfil',
])
@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div class="container">
        <div>
            <p><b>Nome: </b>{{ $user->name }}</p>
            <p><b>E-mail: </b>{{ $user->email }}</p>
            <p><b>CPF: </b>{{ $user->cpf }}</p>
        </div>
    
        <div class="">
            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Editar perfil</a>
            <a href="{{ route('profile.password.edit') }}" class="btn btn-warning">Trocar Senha</a>
        </div>

        <a href="{{ route('enderecos') }}" class="btn btn-warning">Meus Endereços</a>
    </div>
@stop
