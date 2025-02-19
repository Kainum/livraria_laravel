<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class LivrosController extends Controller
{
    public function index (Request $request) {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Livro::orderBy('titulo')->paginate($paginate_value);
        else
            $item_list = Livro::where('titulo', 'like', "%$filtragem%")
                            ->orderBy('titulo')
                            ->paginate($paginate_value)
                            ->setpath('livros?desc_filtro='.$filtragem);
        return view('admin.books.index', compact('item_list'));
    }

    public function create () {
        return view('admin.books.create');
    }

    public function store (LivroRequest $request) {
        $new_item = $request->all();
        
        if ($request->hasFile('file')) {
            $new_item["imagem"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["imagem"] = Util::NO_IMAGE_TEXT;
        }
        
        Livro::create($new_item);
        return redirect()->route('admin.books.index');
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
        return view('admin.books.edit', compact('item'));
    }

    public function update(LivroRequest $request, $id) {
        $updated_item = $request->all();
        $item = Livro::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["imagem"] = Util::updateFile($request->file('file'), $item["imagem"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.books.index');
    }
}
