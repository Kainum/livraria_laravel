<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

        if ($request->hasFile('file')) {
            $new_item["image"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["image"] = Util::NO_IMAGE_TEXT;
        }

        Genre::create($new_item);
        return redirect()->route('admin.genres.index');
    }

    public function edit($id)
    {
        $item = Genre::find(Crypt::decrypt($id));
        return view('admin.genres.edit', compact('item'));
    }

    public function update(GenreRequest $request, $id)
    {
        $updated_item = $request->all();
        $item = Genre::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["image"] = Util::updateFile($request->file('file'), $item["image"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.genres.index');
    }

    public function destroy($id)
    {
        try {
            Genre::find(Crypt::decrypt($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
