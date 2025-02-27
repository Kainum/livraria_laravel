<h4>Detalhes do Produto</h4>
<table class="table table-centered table-nowrap mb-0 rounded">
    <tr>
        <td>ISBN</td>
        <td class="fw-bold">{{ $item->isbn }}</td>
    </tr>
    <tr>
        <td>Autor</td>
        <td class="fw-bold">{{ $item->author }}</td>
    </tr>
    <tr>
        <td>Data de Lançamento</td>
        <td class="fw-bold">{{ Carbon\Carbon::parse($item->release_date)->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <td>Quantidade de Páginas</td>
        <td class="fw-bold">{{ $item->page_number }}</td>
    </tr>
    <tr>
        @php
            $genres = array_column($item->collection->genres->toArray(), 'name');
        @endphp
        <td>Gêneros</td>
        <td class="fw-bold">{{ implode(', ', $genres) }}</td>
    </tr>
    <tr>
        <td>Publisher</td>
        <td class="fw-bold">{{ $item->publisher->name }}</td>
    </tr>
</table>
