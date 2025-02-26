@extends('layouts.shop', [
    'model_title' => 'Meu Perfil',
    'page_title' => 'Meu Perfil',
])
@section('content')
    @if (session('message'))
        <ul class="alert alert-success">
            <div>{{ session('message') }}</div>
        </ul>
    @endif
    <div class="d-flex gap-5 align-items-center mb-3">
        <span>Nome: <b>{{ $user->name }}</b></span>
        <span>E-mail: <b>{{ $user->email }}</b></span>
        <span>CPF: <b>{{ $user->cpf }}</b></span>
    </div>
    
    <hr>

    <div class="d-flex gap-3">
        <x-profile.edit-info :$user />
        <x-profile.edit-password />
    </div>

    <hr>

    <div class="mb-3">
        <h3>Endereços</h3>
        @if (!empty($user->addresses))
            <a href="{{ route('profile.addresses.create') }}" class="btn btn-info">Novo Endereço</a>
            <table class="table table-nowrap table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Endereço</th>
                        <th class="col-2 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->addresses as $item)
                        <tr>
                            <td class="py-1">
                                <p class="m-0">
                                    {{ "$item->destinatario - $item->phone_number" }}
                                    <br>
                                    {{ "$item->endereco, $item->numero - $item->bairro" }}
                                    <br>
                                    {{ "$item->cidade, $item->uf - $item->cep" }}
                                </p>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('profile.addresses.edit', ['id' => \Crypt::encrypt($item->id)]) }}"
                                    class="btn btn-success m-0">Editar</a>
                                <a href="{{ route('profile.addresses.destroy', ['id' => \Crypt::encrypt($item->id)]) }}"
                                    class="btn btn-danger m-0 delete-confirm">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <p>Você não possui endereços cadastrados</p>
                <a href="{{ route('profile.addresses.create') }}" class="btn btn-info">Novo Endereço</a>
            </div>
        @endif
    </div>

@stop

@section('js')
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00', {
                reverse: false
            });
        });
    </script>
@stop
