<div class="col-4 card p-3 shadow">
    <form action="{{ route('profile.password.update') }}" method="post">
        @csrf

        <h3>Trocar senha</h3>
        <hr>
        <div class="form-group mb-3">
            <label for="current_password">Senha Atual:</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
            @error('current_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <hr>
        <div class="form-group mb-3">
            <label for="new_password">Nova Senha:</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required minlength="8">
            @error('new_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="confirm_password">Repetir Senha:</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required minlength="8">
            @error('confirm_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group d-grid">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </div>
    </form>
</div>