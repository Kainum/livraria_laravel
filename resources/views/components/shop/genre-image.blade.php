<div class="col-6 col-sm-4 col-xl-3 mb-4">
    <a href="{{ route('genre.view', ['slug' => $item->slug]) }}">

        <img class="object-fit-cover" style="width:576px;height:680px;"
            src="{{ $item->image ? \App\Services\Operations::getFile($item->image) : asset('/assets/images/fill/fill_genre.jpg') }}">

        <div class="bg-black text-white py-2 fs-3 text-center">
            <span>{{ $item->name }}</span>
        </div>
    </a>
</div>
