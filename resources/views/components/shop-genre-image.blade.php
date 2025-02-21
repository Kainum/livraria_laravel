<div class="col-6 col-sm-4 col-xl-3 mb-4">
    <a href="{{ route('browse.colecoes', ['id' => \Crypt::encrypt($item->id)]) }}">
        {{-- <img class="img-fluid" src="{{ route('image.show', [
            'image_path'=>$item->image,
            'width'=>576,
            'height'=>760,
            ]) }}"> --}}
        <img class="img-fluid" width="576px" height="760px"
            src="https://conteudo.imguol.com.br/c/entretenimento/d8/2017/09/27/bob-esponja-1506562776988_v2_3x4.jpg">
        <div class="bg-black text-white py-2 fs-3 text-center">
            <span>{{ $item->name }}</span>
        </div>
    </a>
</div>