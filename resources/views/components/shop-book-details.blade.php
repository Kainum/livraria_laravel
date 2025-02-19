<h4>Detalhes do Produto</h4>
<table class="table table-centered table-nowrap mb-0 rounded">
    <tr>
        <td>ISBN</td>
        <td class="fw-bold">{{ $item->isbn }}</td>
    </tr>
    <tr>
        <td>Autor</td>
        <td class="fw-bold">{{ $item->autor }}</td>
    </tr>
    <tr>
        <td>Data de Lançamento</td>
        <td class="fw-bold">{{ Carbon\Carbon::parse($item->data_lancamento)->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td>Quantidade de Páginas</td>
        <td class="fw-bold">{{ $item->paginas }}</td>
    </tr>
    <tr>
        @php
            $generos = array_column($item->colecao->generos->toArray(), 'nome');
        @endphp
        <td>Gêneros</td>
        <td class="fw-bold">{{ implode(', ', $generos) }}</td>
    </tr>
    <tr>
        <td>Editora</td>
        <td class="fw-bold">{{ $item->editora->nome }}</td>
    </tr>
</table>
