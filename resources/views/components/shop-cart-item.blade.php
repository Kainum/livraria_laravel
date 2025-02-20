<div class="row m-0 border border-2">
    <div class="col-md-9 d-flex">
        <div class="col-lg-2 col-md-3 col-5">
            <img class="img-fluid"
                src="{{ route('image.show', [
                    'image_path' => $item->produto->imagem,
                    'width' => 576,
                    'height' => 760,
                ]) }}">
        </div>
        <div class="row col-lg-10 col-md-9 col-7">
            <p>{{ $item->produto->titulo }}</p>
            <p>R$ {{ \App\Util::formataDinheiro($item->valor_item) }}</p>
        </div>
    </div>
    <div class="col-md-3 row m-0 gap-2">
        <div class="col-md-12 col-7 row m-0 p-0 text-black align-items-center">

            <a class="btn btn-secondary col-3 text-center px-0 m-0" href="{{ route('cart.sub', ['id' => $item->id]) }}">
                <i class="fa-solid fa-{{ $item->qtd > 1 ? 'minus' : 'trash-can' }}"></i>
            </a>

            <div class="col text-center m-0">{{ $item->qtd }}</div>

            @if ($item->qtd < min($item->produto->qtd_estoque, \App\Util::QTD_MAX_POR_CLIENTE))
                <a class="btn btn-secondary col-3 text-center px-0 m-0" href="{{ route('cart.add', ['id' => $item->id]) }}">
                    <i class="fa-solid fa-plus"></i>
                </a>
            @else
                <button class="btn btn-secondary col-3 text-center px-0 m-0" disabled>
                    <i class="fa-solid fa-plus"></i>
                </button>
            @endif
        </div>
        <a class="col-md-12 col btn btn-warning m-0" href="{{ route('cart.exclude', ['id' => $item->id]) }}">excluir</a>
    </div>
</div>
