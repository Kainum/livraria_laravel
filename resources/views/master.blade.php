<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>{{ $page_title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="Volt Premium Bootstrap Dashboard - Forms">
  <meta name="author" content="Themesberg">
  <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
  <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="og:title" content="Volt Premium Bootstrap Dashboard - Forms">
  <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Forms">
  <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="{{ url('volt/assets/img/favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('volt/assets/img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('volt/assets/img/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ url('volt/assets/img/favicon/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ url('volt/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="{{ url('volt/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="{{ url('volt/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="{{ url('volt/css/volt.css') }}" rel="stylesheet">

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

  <script src="https://kit.fontawesome.com/af7b79f679.js" crossorigin="anonymous"></script>

  @yield('style')
</head>

<body>

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
        
  <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{ url('volt/index.html') }}">
      <img class="navbar-brand-dark" src="{{ url('volt/assets/img/brand/light.svg') }}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{ url('volt/assets/img/brand/dark.svg') }}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
      <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
      {{-- MENU MOBILE --}}
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        @if (Auth::guard('web')->check())
          <div class="d-flex align-items-center">
            {{-- <div class="avatar-lg me-4">
              <img src="{{ url('volt/assets/img/team/profile-picture-3.jpg') }}" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
            </div> --}}

            <div class="d-block">
              <h2 class="h5 mb-3">Olá, {{ Auth::guard('web')->user()->name }}</h2>
              {{ Form::open(['route'=>'logout']) }}
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                  <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>            
                  Log Out
                </button>
              {{ Form::close() }}
            </div>
          </div>
        @endif
        <div class="collapse-close d-md-none">
          <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
        </div>
      </div>
      <!-- SIDEBAR MENU -->
      <ul class="nav flex-column pt-3 pt-md-0">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="{{ url('volt/assets/img/brand/light.svg') }}" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">Livrarias Leia +</span>
          </a>
        </li>
        @if (!Auth::guard('web')->check())
          <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
          <li class="nav-item">
            <a href="{{ route("login") }}">Entre</a> ou <a href="{{ route("register") }}">Cadastre-se</a>
            </span>
          </li>
        @endif
        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        <li class="nav-item">
          <a href="{{ route("home") }}" class="nav-link">
            <div class="col-10">
              <i class="col-3 fa-solid fa-house" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Home</span>
            </div>
          </a>
        </li>
        @if (Auth::guard('web')->check())
        <li class="nav-item">
          <a href="{{ route('profile.view') }}" class="nav-link">
            <div class="col-10">
              <i class="col-3 fa-solid fa-user" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Meu Perfil</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('meus_pedidos') }}" class="nav-link">
            <div class="col-10">
              <i class="col-3 fa-solid fa-box" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Meus Pedidos</span>
            </div>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{ route('wishlist') }}" class="nav-link">
            <div class="col-10">
              <i class="col-3 fa-solid fa-heart" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Lista de Desejos</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cart.page') }}" class="nav-link">
            <div class="col-10">
              <i class="col-3 fa-solid fa-cart-shopping" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Carrinho</span>
            </div>
          </a>
        </li>
        <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
        <li class="nav-item">
          <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" data-bs-target="#submenu-generos">
            <a href="{{ route("browse") }}" class="col-10">
              <i class="col-3 fa-solid fa-book-open" style="color: lightgray"></i>
              <span class="col-9 sidebar-text">Gêneros</span>
            </a>
            <span class="link-arrow">
              <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </span>
          </span>
          <div class="multi-level collapse " role="list"
            id="submenu-generos" aria-expanded="false">
            <ul class="flex-column nav">
              @foreach ( App\Models\Genero::orderBy("nome")->get()->take(10) as $item)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('browse.colecoes', ['id'=>\Crypt::encrypt($item->id)]) }}">
                    <span class="sidebar-text">{{ $item->nome }}</span>
                  </a>
                </li>
              @endforeach
              <li class="nav-item">
                <a href="{{ route("browse") }}" class="nav-link">
                  <span class="sidebar-text">-- Ver todos --</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>
    
  <main class="content">
    <!-- NAV TOP -->
    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
          <div class="d-flex align-items-center">
            <!-- Search form -->
            {{ Form::open(['name'=>'form_name', 'route'=>'search']) }}
              <div class="sidebar-form">
              <div class="input-group">
                <input type="text" name="pesquisa" class="form-control" style="width: 80% !important;" placeholder="Pesquisa...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              </div>
            {{ Form::close() }}
            <!-- / Search form -->
          </div>
          <!-- Navbar links -->
          @if ( Auth::guard('web')->check() )
            <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown">
                <a class="nav-link text-dark notification-bell dropdown-toggle" data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  <i class="fa-solid fa-cart-shopping" style="color: dimgray"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                  <div class="list-group list-group-flush">
                    <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Carrinho</a>
                    <a href="#" class="list-group-item list-group-item-action border-bottom">
                      <div class="row align-items-center">
                          <div class="col-auto">
                            <!-- Avatar -->
                            <img alt="Image placeholder" src="{{ url('volt/assets/img/team/profile-picture-1.jpg') }}" class="avatar-md rounded">
                          </div>
                          <div class="col ps-0 ms-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                  <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                                </div>
                                <div class="text-end">
                                  <small class="text-danger">a few moments ago</small>
                                </div>
                            </div>
                            <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                          </div>
                      </div>
                    </a>

                    <a href="{{ route('cart.page') }}" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                      <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                      Ver tudo
                    </a>
                  </div>
                </div>
              </li>
              {{-- Perfil --}}
              <li class="nav-item dropdown ms-lg-3">
                <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="media d-flex align-items-center">
                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                      <span class="mb-0 font-small text-gray-900">Olá, </span>
                      <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::guard('web')->user()->name }}</span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.view') }}">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    Meu perfil
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('meus_pedidos') }}">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    Meus pedidos
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('wishlist') }}">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                    Lista de desejos
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('enderecos') }}">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
                    Meus endereços
                  </a>
                  <div role="separator" class="dropdown-divider my-1"></div>
                  
                  <div class="dropdown-item d-flex align-items-center" href="#">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>                
                      {{-- {{ Form::submit('Logout') }} --}}
                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                          Log Out
                      </x-dropdown-link>
                    </form>
                    
                  </div>
                </div>
              </li>
            </ul>
          @else
            <a href="{{ route('login') }}">
              Fazer Login
            </a>
          @endif
        </div>
      </div>
    </nav>

    <div class="py-4">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
          <li class="breadcrumb-item">
            <a href="#">
              <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </a>
          </li>
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $model_title }}</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
          <h1 class="h4">{{ $model_title }}</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
          <div class="card-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
      <div class="row">
        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
          <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
        </div>
        <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
          <!-- List -->
          <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
            <li class="list-inline-item px-0 px-sm-2">
              <a href="https://themesberg.com/about">About</a>
            </li>
            <li class="list-inline-item px-0 px-sm-2">
              <a href="https://themesberg.com/themes">Themes</a>
            </li>
            <li class="list-inline-item px-0 px-sm-2">
              <a href="https://themesberg.com/blog">Blog</a>
            </li>
            <li class="list-inline-item px-0 px-sm-2">
              <a href="https://themesberg.com/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </main>

  <!-- Core -->
  <script src="{{ url('volt/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
  <script src="{{ url('volt/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <!-- Vendor JS -->
  <script src="{{ url('volt/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

  <!-- Slider -->
  <script src="{{ url('volt/vendor/nouislider/distribute/nouislider.min.js') }}"></script>

  <!-- Smooth scroll -->
  <script src="{{ url('volt/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

  <!-- Charts -->
  <script src="{{ url('volt/vendor/chartist/dist/chartist.min.js') }}"></script>
  <script src="{{ url('volt/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

  <!-- Datepicker -->
  <script src="{{ url('volt/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

  <!-- Sweet Alerts 2 -->
  <script src="{{ url('volt/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

  <!-- Vanilla JS Datepicker -->
  <script src="{{ url('volt/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

  <!-- Notyf -->
  <script src="{{ url('volt/vendor/notyf/notyf.min.js') }}"></script>

  <!-- Simplebar -->
  <script src="{{ url('volt/vendor/simplebar/dist/simplebar.min.js') }}"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Volt JS -->
  <script src="{{ url('volt/assets/js/volt.js') }}"></script>

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  @yield('js')
</body>

</html>
