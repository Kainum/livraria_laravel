<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gêneros</title>
</head>
<body>
    <h1>Gêneros</h1>
    <ul>
        @foreach ($generos as $gen)
            <li>{{ $gen->nome }}</li>
            <li>{{ $gen->imagem }}</li>
        @endforeach
    </ul>
    view para apresentar os generos.
</body>
</html>