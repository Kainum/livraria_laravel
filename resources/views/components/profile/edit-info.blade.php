<div class="col-4 card p-3 shadow">
    <form action="{{ route('profile.update') }}" method="post">
        @csrf

        <h3>Editar Informações</h3>
        <hr>
        <div class="form-group mb-3">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" required maxlength="255" value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control cpf" required maxlength="14" value="{{ old('cpf', $user->cpf) }}">
            @error('cpf')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <hr>
        <div class="form-group mb-3">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group d-grid">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>