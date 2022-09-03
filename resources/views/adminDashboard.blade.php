<!DOCTYPE html>
<html>
    <head>
        <title>Neumorphism/Soft UI</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            .form-control,
            .form-control:focus,
            .btn {
                border-radius: 50px;
                background: #e0e0e0;
                box-shadow: 20px 20px 60px #bebebe,
                    -20px -20px 60px #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1 class="text-center m-5">Admin dashboard</h1>
                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <form method="get" action="{{ route('admin.logout') }}">
                        @csrf
                        <div class="row mt-3">
                            <button type="submit" class="btn">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>