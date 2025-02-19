<!-- NAV TOP -->
<nav class="navbar d-none d-lg-block">
    <div class="d-flex justify-content-between">

        {{-- Search form --}}
        <form action="{{ route('search') }}" method="post" class="col-6">
            <div class="input-group">
                <input type="text" name="pesquisa" class="form-control w-75" placeholder="Pesquisa...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <!-- Navbar links -->
        @if (Auth::guard('web')->check())
            <div class="d-flex align-items-center">
                {{-- carrinho --}}
                <x-shop-navbar-cart-button />

                {{-- Perfil --}}
                <div class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="fs-sm me-3 text-black">
                            Olá, <span class="fw-bold">{{ Auth::guard('web')->user()->name }}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end">
                        <a class="dropdown-item d-flex" href="{{ route('profile.view') }}">
                            <i class="fa-regular fa-circle-user fs-5 me-2"></i>Meu perfil
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('meus_pedidos') }}">
                            <i class="fa-regular fa-circle-user fs-5 me-2"></i>Meus pedidos
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('wishlist.index') }}">
                            <i class="fa-regular fa-circle-user fs-5 me-2"></i>Lista de desejos
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('enderecos.index') }}">
                            <i class="fa-regular fa-circle-user fs-5 me-2"></i>Meus endereços
                        </a>
                    </div>
                </div>

                {{-- log out --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-secondary">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        Log Out
                    </button>

                </form>
            </div>
        @else
            <a href="{{ route('login') }}">
                Fazer Login
            </a>
        @endif
    </div>
</nav>
