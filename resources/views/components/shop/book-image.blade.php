@php
    $route = route('product.view', ['slug' => $item->slug]);

    $color = $item->qty_in_stock > 0 ? 'success' : 'warning';
    $icon = $item->qty_in_stock > 0 ? 'cart-shopping' : 'triangle-exclamation';
@endphp

<div class="col-6 col-sm-4 col-xl-3 mb-4 px-2">

    <a href="{{ $route }}">
        <img class="object-fit-cover" style="width:576px;height:680px;"
            src="{{ $item->image ? Storage::url($item->image) : asset('/assets/images/fill/fill_book.jpg') }}">
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
