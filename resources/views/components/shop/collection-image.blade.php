<div class="col-6 col-sm-4 col-xl-3 mb-1">

    <a href="{{ route('collection.view', ['slug' => $item->slug]) }}">

        <img class="img-fluid" width="576px" height="760px"
            src="https://www.smashbros.com/assets_v2/img/top/hero05_en.jpg">
            
        <div class="py-3 text-center">
            <span class="fs-3">{{ $item->name }}</span>
        </div>

    </a>
</div>