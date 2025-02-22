@php
    $route = route('produto.view', ['id' => \Crypt::encrypt($item->id)]);

    $color = $item->qty_in_stock > 0 ? 'success' : 'warning';
    $icon = $item->qty_in_stock > 0 ? 'cart-shopping' : 'triangle-exclamation';
@endphp

<div class="col-6 col-sm-4 col-xl-3 mb-4 px-2">

    <a href="{{ $route }}">
        <img class="img-fluid" width="576px" height="760px"
            src="https://br.web.img3.acsta.net/medias/nmedia/18/93/64/37/20269376.jpg">
    </a>

    <a href="{{ $route }}">
        {{ $item->product_name }}
    </a>

    <a href="{{ $route }}">
        <div class="d-flex align-items-center justify-content-between">
            <span>{{ \App\Services\Operations::money($item->price) }}</span>
            <button class="btn btn-{{ $color }} col-4" type="submit">
                <i class="fa-solid fa-{{ $icon }} text-white"></i>
            </button>
        </div>
    </a>
</div>
