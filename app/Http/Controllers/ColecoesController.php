<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColecaoRequest;
use App\Models\Colecao;
use App\Models\GeneroColecao;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ColecoesController extends Controller
{
    public function index (Request $filtro) {
        $paginate_value = 10;

        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $list = Colecao::orderBy('nome')->paginate($paginate_value);
        else
            $list = Colecao::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate($paginate_value)
                            ->setpath('colecoes?desc_filtro='.$filtragem);
        return view('colecoes.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('colecoes.create');
    }

    public function store (ColecaoRequest $request) {
        $new_item = $request->all();
        
        // guarda a imagem do upload
        if ($request->hasFile('file')) {
            $new_item["imagem"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["imagem"] = Util::NO_IMAGE_TEXT;
        }

        $ni = Colecao::create($new_item);


        // vincula os generos na coleção
        $generos = $request->generos;

        foreach($generos as $gen => $value) {
            GeneroColecao::create([
                                'genero_id'=>$generos[$gen],
                                'colecao_id'=>$ni->id,
                                ]);
        }

        return redirect()->route('admin.colecoes');
    }

    public function destroy($id) {
        try {
            Colecao::find(Crypt::decrypt($id))->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $item = Colecao::find(Crypt::decrypt($request->get('id')));
        return view('colecoes.edit', compact('item'));
    }

    public function update(ColecaoRequest $request, $id) {
        $updated_item = $request->all();

        //dd($request->file('file'));
        if ($request->hasFile('file')) {
            $updated_item["imagem"] = Util::updateFile($request->file('file'), $updated_item["imagem"]);
        }

        $ni = Colecao::find(Crypt::decrypt($id));

        //================================================

        // atualiza o item
        $ni->update($updated_item);


        // delete os generos vinculados
        $ni->generos()->delete();
        // vincula os generos na coleção
        $generos = $request->generos;

        foreach($generos as $gen => $value) {
            GeneroColecao::create([
                                'genero_id'=>$generos[$gen],
                                'colecao_id'=>$ni->id,
                                ]);
        }

        return redirect()->route('admin.colecoes');
    }
}
