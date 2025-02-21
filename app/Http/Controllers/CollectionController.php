<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use App\Models\CollectionGenre;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Collection::orderBy('name')->paginate($paginate_value);
        else
            $item_list = Collection::where('name', 'like', "%$filtragem%")
                ->orderBy('name')
                ->paginate($paginate_value)
                ->setpath('colecoes?desc_filtro=' . $filtragem);
        return view('admin.collections.index', compact('item_list'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(CollectionRequest $request)
    {
        $new_item = $request->all();

        // guarda a image do upload
        if ($request->hasFile('file')) {
            $new_item["image"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["image"] = Util::NO_IMAGE_TEXT;
        }

        $new_item = Collection::create($new_item);

        // vincula os generos na coleção
        if (isset($request->generos)) {
            $generos = $request->generos;

            foreach ($generos as $value) {
                CollectionGenre::create([
                    'genre_id' => $value,
                    'collection_id' => $new_item->id,
                ]);
            }
        }

        return redirect()->route('admin.collections.index');
    }

    public function destroy($id)
    {
        try {
            Collection::find(Crypt::decrypt($id))->delete();
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
        $item = Collection::find(Crypt::decrypt($request->get('id')));
        return view('admin.collections.edit', compact('item'));
    }

    public function update(CollectionRequest $request, $id)
    {
        $updated_item = $request->all();
        $item = Collection::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["image"] = Util::updateFile($request->file('file'), $item["image"]);
        }

        //================================================

        // atualiza o item
        $item->update($updated_item);

        // delete os generos vinculados
        CollectionGenre::where('collection_id', $item->id)->delete();
        
        // vincula os generos na coleção
        if (isset($request->generos)) {
            $generos = $request->generos;

            foreach ($generos as $value) {
                CollectionGenre::create([
                    'genre_id' => $value,
                    'collection_id' => $item->id,
                ]);
            }
        }

        return redirect()->route('admin.collections.index');
    }
}
