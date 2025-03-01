<div class="nav-item dropdown">
    <a class="nav-link notification-bell dropdown-toggle" data-unread-notifications="true" href="#" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-cart-shopping" style="color: dimgray"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
        <div class="list-group list-group-flush">
            <a href="{{ route('cart.page') }}" class="text-center text-primary fw-bold py-3">Carrinho</a>
            <hr class="m-0">

            @php
                $cart_items = App\Services\Cart::content()?->items->take(3) ?? [];
            @endphp
            @foreach ($cart_items as $cart_item)
                <a href="{{ route('product.view', ['slug' => $cart_item->slug]) }}"
                    class="list-group-item list-group-item-action border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="col-2">
                            <img class="object-fit-cover" style="width:576px;height:680px;"
                                src="{{ $cart_item->image ? Storage::url($cart_item->image) : asset('/assets/images/fill/fill_book.jpg') }}">
                        </div>
                        <div class="col-9">
                            <p class="font-small mt-1 mb-0 text-truncate" style="max-width: 200px;">
                                {{ $cart_item->product_name }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

            <a href="{{ route('cart.page') }}" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                <i class="fa-solid fa-eye"></i> Ver tudo
            </a>
        </div>
    </div>
</div>
