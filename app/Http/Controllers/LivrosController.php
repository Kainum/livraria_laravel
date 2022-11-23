<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class LivrosController extends Controller
{
    public function index (Request $filtro) {
        $paginate_value = 10;

        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $list = Livro::orderBy('titulo')->paginate($paginate_value);
        else
            $list = Livro::where('titulo', 'like', '%'.$filtragem.'%')
                            ->orderBy('titulo')
                            ->paginate($paginate_value)
                            ->setpath('livros?desc_filtro='.$filtragem);
        return view('livros.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('livros.create');
    }

    public function store (LivroRequest $request) {
        $new_item = $request->all();
        
        if ($request->hasFile('file')) {
            $stored_file = $request->file('file')->store('images', 'public');
            $new_item["imagem"] = pathinfo($stored_file)['basename'];
        } else {
            $new_item["imagem"] = 'no-image.webp';
        }
        
        Livro::create($new_item);
        return redirect()->route('admin.livros');
    }

    public function destroy($id) {
        try {
            Livro::find(Crypt::decrypt($id))->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $item = Livro::find(Crypt::decrypt($request->get('id')));
        return view('livros.edit', compact('item'));
    }

    public function update(LivroRequest $request, $id) {
        $updated_item = $request->all();

        //dd($request->file('file'));
        if ($request->hasFile('file')) {
            if (Storage::exists('images/'.$updated_item["imagem"])) {
                Storage::delete('images/'.$updated_item["imagem"]);             // delete da imagem antiga no storage
            }
            $stored_file = $request->file('file')->store('images', 'public');   // guarda nova imagem no storage
            $updated_item["imagem"] = pathinfo($stored_file)['basename'];
        }

        Livro::find(Crypt::decrypt($id))->update($updated_item);
        return redirect()->route('admin.livros');
    }
}
