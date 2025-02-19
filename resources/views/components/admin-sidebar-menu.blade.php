{{-- MOBILE --}}
<nav class="navbar navbar-dark navbar-theme-primary px-4 d-lg-none">
    <div class="d-flex align-items-center ms-auto">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

{{-- SIDEBAR MENU --}}
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner">
        {{-- MENU MOBILE --}}
        <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center p-4">

            <form action="{{ route('admin.logout') }}" method="post">
                <h2 class="h5 mb-3">Olá, {{ Auth::guard('admin')->user()->name }}</h2>

                @csrf

                <button type="submit" class="btn btn-secondary btn-sm">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                    Log Out
                </button>
            </form>

            <div class="collapse-close d-md-none h2">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                    <i class="fa-regular fa-circle-xmark"></i>
                </a>
            </div>
        </div>

        <!-- SIDEBAR MENU -->
        <ul class="nav flex-column text-white p-4">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-user-tie col-2"></i>
                    <span class="col">Área Administrativa</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                    <i class="fa-solid fa-gauge-simple-high col-2"></i>
                    <span class="col">Dashboard</span>
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <span class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-manutencoes">
                    <i class="fa-solid fa-folder-open col-2"></i>
                    <span class="col">Manutenções</span>
                    <i class="link-arrow fa-solid fa-chevron-right col-2"></i>
                </span>
                <div class="multi-level collapse" role="list" id="submenu-manutencoes" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.books.index') }}">
                                <span class="sidebar-text">Livros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.collections.index') }}">
                                <span class="sidebar-text">Coleções</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.genres.index') }}">
                                <span class="sidebar-text">Gêneros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.publishers.index') }}">
                                <span class="sidebar-text">Editoras</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <span class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-relatorios">
                    <i class="fa-solid fa-square-poll-horizontal col-2"></i>
                    <span class="col">Relatórios</span>
                    <i class="link-arrow fa-solid fa-chevron-right col-2"></i>
                </span>

                <div class="multi-level collapse" role="list" id="submenu-relatorios" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.relatorios.estoque.page') }}">
                                <span class="sidebar-text">Qtd. Estoque</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.relatorios.vendas_periodo.page') }}">
                                <span class="sidebar-text">Vendas por Período</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>