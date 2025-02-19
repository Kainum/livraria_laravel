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
    public function index(Request $request)
    {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Colecao::orderBy('nome')->paginate($paginate_value);
        else
            $item_list = Colecao::where('nome', 'like', "%$filtragem%")
                ->orderBy('nome')
                ->paginate($paginate_value)
                ->setpath('colecoes?desc_filtro=' . $filtragem);
        return view('admin.collections.index', compact('item_list'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(ColecaoRequest $request)
    {
        $new_item = $request->all();

        // guarda a imagem do upload
        if ($request->hasFile('file')) {
            $new_item["imagem"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["imagem"] = Util::NO_IMAGE_TEXT;
        }

        $new_item = Colecao::create($new_item);

        // vincula os generos na coleção
        if (isset($request->generos)) {
            $generos = $request->generos;

            foreach ($generos as $value) {
                GeneroColecao::create([
                    'genero_id' => $value,
                    'colecao_id' => $new_item->id,
                ]);
            }
        }

        return redirect()->route('admin.collections.index');
    }

    public function destroy($id)
    {
        try {
            Colecao::find(Crypt::decrypt($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request)
    {
        $item = Colecao::find(Crypt::decrypt($request->get('id')));
        return view('admin.collections.edit', compact('item'));
    }

    public function update(ColecaoRequest $request, $id)
    {
        $updated_item = $request->all();
        $item = Colecao::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["imagem"] = Util::updateFile($request->file('file'), $item["imagem"]);
        }

        //================================================

        // atualiza o item
        $item->update($updated_item);

        // delete os generos vinculados
        $item->generos()->delete();
        // vincula os generos na coleção
        if (isset($request->generos)) {
            $generos = $request->generos;

            foreach ($generos as $value) {
                GeneroColecao::create([
                    'genero_id' => $value,
                    'colecao_id' => $item->id,
                ]);
            }
        }

        return redirect()->route('admin.collections.index');
    }
}
