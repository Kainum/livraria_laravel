<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneroRequest;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GenerosController extends Controller
{

    public function index (Request $filtro) {
        $paginate_value = 10;

        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $list = Genero::orderBy('nome')->paginate($paginate_value);
        else
            $list = Genero::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate($paginate_value)
                            ->setpath('generos?desc_filtro='.$filtragem);
        return view('generos.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('generos.create');
    }

    public function store (GeneroRequest $request) {
        $new_item = $request->all();
        
        if ($request->hasFile('file')) {
            $stored_file = $request->file('file')->store('images', 'public');
            $new_item["imagem"] = pathinfo($stored_file)['basename'];
        } else {
            $new_item["imagem"] = 'no-image.webp';
        }

        Genero::create($new_item);
        return redirect()->route('admin.generos');
    }

    public function destroy($id) {
        Genero::find(Crypt::decrypt($id))->delete();
        return redirect()->route('admin.generos');
    }

    public function edit(Request $request) {
        $item = Genero::find(Crypt::decrypt($request->get('id')));
        return view('generos.edit', compact('item'));
    }

    public function update(GeneroRequest $request, $id) {
        Genero::find(Crypt::decrypt($id))->update($request->all());
        return redirect()->route('admin.generos');
    }
}
