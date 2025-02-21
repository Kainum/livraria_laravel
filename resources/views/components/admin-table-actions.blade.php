<td class="text-center py-0">
    @php
        $id = \Crypt::encrypt($item->id);
    @endphp
    <a href="{{ route("$route.edit", compact('id')) }}" class="btn btn-success btn-sm">Editar</a>
    <a href="{{ route("$route.destroy", compact('id')) }}" class="btn btn-danger btn-sm delete-confirm">Remover</a>
</td>
