@php
    $route = route('produto.view', ['id' => \Crypt::encrypt($item->id)]);

    $color = $item->qtd_estoque > 0 ? 'success' : 'warning';
    $icon = $item->qtd_estoque > 0 ? 'cart-shopping' : 'triangle-exclamation';
@endphp

<div class="col-6 col-sm-4 col-xl-3 mb-4 px-2">

    <a href="{{ $route }}">
        <img class="img-fluid" width="576px" height="760px"
            src="https://br.web.img3.acsta.net/medias/nmedia/18/93/64/37/20269376.jpg">
    </a>

    <a href="{{ $route }}">
        {{ $item->titulo }}
    </a>

    <a href="{{ $route }}">
        <div class="d-flex align-items-center justify-content-between">
            <span>R${{ \App\Util::formataDinheiro($item->preco) }}</span>
            <button class="btn btn-{{ $color }} col-4" type="submit">
                <i class="fa-solid fa-{{ $icon }} text-white"></i>
            </button>
        </div>
    </a>
</div>
