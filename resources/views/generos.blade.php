<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gêneros</title>
</head>
<body>
    <h1>Gênero: {{ $nome }}</h1>
    @if(Auth::guard('admin')->check())
        Você é admin
    @elseif(Auth::guard('web')->check())
        Você é padrão
    @endif
    <br>
    view para apresentar os generos.
</body>
</html>