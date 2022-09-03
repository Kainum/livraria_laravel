<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gêneros</title>
</head>
<body>
<<<<<<< HEAD
    <h1>Gêneros</h1>
    <ul>
        @foreach ($generos as $gen)
            <li>{{ $gen->nome }}</li>
            <li>{{ $gen->imagem }}</li>
        @endforeach
    </ul>
=======
    <h1>Gênero: {{ $nome }}</h1>
    @if(Auth::guard('admin')->check())
        Você é admin
    @elseif(Auth::guard('web')->check())
        Você é padrão
    @endif
    <br>
>>>>>>> develop
    view para apresentar os generos.
</body>
</html>