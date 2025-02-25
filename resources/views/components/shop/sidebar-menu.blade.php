{{-- MOBILE --}}
<nav class="navbar navbar-dark navbar-theme-primary px-4 d-lg-none">
    <div class="d-flex align-items-center ms-auto">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

{{-- SIDEBAR MENU --}}
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner">
        {{-- MENU MOBILE --}}
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center p-4">
            @if (Auth::guard('web')->check())
                <form action="{{ route('logout') }}" method="post">
                    <h2 class="h5 mb-3">Olá, {{ Auth::guard('web')->user()->name }}</h2>

                    @csrf

                    <button type="submit" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        Log Out
                    </button>
                </form>
            @else
                <div>
                    fazer login
                </div>
            @endif
            <div class="collapse-close d-md-none h2">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                    <i class="fa-regular fa-circle-xmark"></i>
                </a>
            </div>
        </div>

        <!-- SIDEBAR MENU -->
        <ul class="nav flex-column text-white p-4">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="{{ url('volt/assets/img/brand/light.svg') }}" height="20" width="20"
                            alt="Volt Logo">
                    </span>
                    <span class="col">Livrarias Leia +</span>
                </a>
            </li>

            @if (!Auth::guard('web')->check())
                <hr>
                <li class="nav-item">
                    <a href="{{ route('login') }}">Entre</a> ou <a href="{{ route('register') }}">Cadastre-se</a>
                </li>
            @endif

            <hr>
            <li class="nav-item ">
                <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-house col-2"></i>
                    <span class="col">Home</span>
                </a>
            </li>
            @if (Auth::guard('web')->check())
                <li class="nav-item ">
                    <a href="{{ route('profile.view') }}" class="nav-link d-flex align-items-center">
                        <i class="fa-solid fa-user col-2"></i>
                        <span class="col">Meu Perfil</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('profile.orders.index') }}" class="nav-link d-flex align-items-center">
                        <i class="fa-solid fa-box col-2"></i>
                        <span class="col">Meus Pedidos</span>
                    </a>
                </li>
            @endif

            <li class="nav-item ">
                <a href="{{ route('profile.wishlist.index') }}" class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-heart col-2"></i>
                    <span class="col">Lista de Desejos</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('cart.page') }}" class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-cart-shopping col-2"></i>
                    <span class="col">Carrinho</span>
                </a>
            </li>

            <hr>
            <li class="nav-item">
                <span class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#submenu-generos">
                    <i class="fa-solid fa-folder-open col-2"></i>
                    <span class="col">Gêneros</span>
                    <i class="link-arrow text-center fa-solid fa-chevron-right col-2"></i>
                </span>
                <div class="multi-level collapse" role="list" id="submenu-generos" aria-expanded="false">
                    <ul class="flex-column nav">
                        @foreach (App\Models\Genre::orderBy('name')->take(5)->get() as $item)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('browse.collections', ['slug' => $item->slug]) }}">
                                    <span class="sidebar-text">{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="{{ route('browse') }}" class="nav-link">
                                <span class="sidebar-text">-- Ver todos --</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
