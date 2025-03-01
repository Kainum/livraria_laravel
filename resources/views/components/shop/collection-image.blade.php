<div class="col-6 col-sm-4 col-xl-3 mb-1">

    <a href="{{ route('collection.view', ['slug' => $item->slug]) }}">

        <img class="object-fit-cover" style="width:576px;height:680px;"
            src="{{ $item->image ? Storage::url($item->image) : asset('/assets/images/fill/fill_collection.jpg') }}">
            
        <div class="py-3 text-center">
            <span class="fs-3">{{ $item->name }}</span>
        </div>

    </a>
</div>