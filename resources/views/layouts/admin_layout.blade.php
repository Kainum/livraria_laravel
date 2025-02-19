<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }}</title>
</head>

<body>
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ url('volt/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ url('volt/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ url('volt/css/volt.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/af7b79f679.js" crossorigin="anonymous"></script>

    @yield('style')

    <x-admin-sidebar-menu />

    <x-admin-navbar-top />

    <main class="content">

        {{-- Barrinha de Navegação com pesquisa --}}
        <div class="p-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ isset($search_route) ? route($search_route) : '#' }}">{{ $model_title }}</a>
                    </li>
                </ol>
            </nav>
            <h1 class="h4">{{ $model_title }}</h1>
        </div>

        <div class="card shadow components-section mb-4">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="bg-white rounded shadow p-5 my-4">
            <p class="m-0 text-center">
                © 2019-{{ date('Y') }}
                <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a>
            </p>
        </footer>
    </main>


    <!-- Core -->
    <script src="{{ url('volt/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('volt/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ url('volt/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ url('volt/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ url('volt/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <!-- Volt JS -->
    <script src="{{ url('volt/assets/js/volt.js') }}"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Forms -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="{{ asset('/assets/js/admin_forms.js') }}"></script>

    @yield('js')

</body>

</html>
