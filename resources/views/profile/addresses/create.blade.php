@extends('layouts.default_loja', [
    'model_title' => 'Endereços',
    'page_title' => 'Novo Endereço',
])
@section('content')
    <h2>Novo Endereço</h2>

    <form action="{{ route('profile.addresses.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="form-group col mb-3">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control" required maxlength="200"
                    value="{{ old('endereco') }}">
                @error('endereco')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-1 mb-3">
                <label for="numero">Nº:</label>
                <input type="text" name="numero" id="numero" class="form-control" required maxlength="10"
                    value="{{ old('numero') }}">
                @error('numero')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" class="form-control" required maxlength="50"
                    value="{{ old('bairro') }}">
                @error('bairro')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                <label for="complemento">Complemento:</label>
                <input type="text" name="complemento" id="complemento" class="form-control" maxlength="50"
                    value="{{ old('complemento') }}">
                @error('complemento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-2 mb-3">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control cep" required
                    placeholder="00000-000" maxlength="9" value="{{ old('cep') }}">
                @error('cep')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-1 mb-3">
                <label for="uf">UF:</label>
                <input type="text" name="uf" id="uf" class="form-control" required maxlength="2"
                    value="{{ old('uf') }}">
                @error('uf')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" required maxlength="50"
                    value="{{ old('cidade') }}">
                @error('cidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col mb-3">
                <label for="destinatario">Destinatário:</label>
                <input type="text" name="destinatario" id="destinatario" class="form-control" required maxlength="50"
                    value="{{ old('destinatario') }}">
                @error('destinatario')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col mb-3">
                <label for="phone_number">Telefone:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control phone_with_ddd" required
                    placeholder="(00) 00000-0000" maxlength="20" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('profile.view') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>
@stop
