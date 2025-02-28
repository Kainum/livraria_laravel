<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\Operations;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function index(Request $request)
    {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Genre::orderBy('name')->paginate($paginate_value);
        else
            $item_list = Genre::where('name', 'like', "%$filtragem%")
                ->orderBy('name')
                ->paginate($paginate_value)
                ->setpath('generos?desc_filtro=' . $filtragem);
        return view('admin.genres.index', compact('item_list'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(GenreRequest $request)
    {
        $new_item = $request->all();

        // guarda a imagem do upload
        if ($request->hasFile('file')) {
            $new_item["image"] = Operations::storeFile($request->file('file'), 'genres');
        }

        Genre::create($new_item);
        return redirect()->route('admin.genres.index');
    }

    public function edit($id)
    {
        $item = Genre::find(Operations::decryptId($id));
        return view('admin.genres.edit', compact('item'));
    }

    public function update(GenreRequest $request, $id)
    {
        $updated_item = $request->all();
        $item = Genre::find(Operations::decryptId($id));

        if ($request->hasFile('file')) {
            $updated_item["image"] = Operations::updateFile($request->file('file'), 'genres', $item["image"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.genres.index');
    }

    public function destroy($id)
    {
        try {
            Genre::find(Operations::decryptId($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
