<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneroRequest;
use App\Models\Genero;
use App\Util;
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
            $new_item["imagem"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["imagem"] = Util::NO_IMAGE_TEXT;
        }

        Genero::create($new_item);
        return redirect()->route('admin.generos.index');
    }

    public function destroy($id) {
        try {
            Genero::find(Crypt::decrypt($id))->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $item = Genero::find(Crypt::decrypt($request->get('id')));
        return view('generos.edit', compact('item'));
    }

    public function update(GeneroRequest $request, $id) {
        $updated_item = $request->all();
        $item = Genero::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["imagem"] = Util::updateFile($request->file('file'), $item["imagem"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.generos.index');
    }
}
