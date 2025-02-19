<!-- NAV TOP -->
<nav class="navbar navbar-dark p-2 d-none d-lg-block bg-gray-800">
    <div class="container-fluid px-0 justify-content-end align-items-center">
        {{-- Perfil --}}
        <div class="text-dark fs-sm me-3 text-white">
            Olá, <span class="fw-bold">{{ Auth::guard('admin')->user()->name }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-secondary">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                Log Out
            </button>

        </form>
    </div>
</nav>