<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditoraRequest;
use App\Models\Editora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EditorasController extends Controller
{

    public function index (Request $request) {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Editora::orderBy('nome')->paginate($paginate_value);
        else
            $item_list = Editora::where('nome', 'like', "%$filtragem%")
                            ->orderBy('nome')
                            ->paginate($paginate_value)
                            ->setpath('editoras?desc_filtro='.$filtragem);
        return view('admin.publishers.index', compact('item_list'));
    }

    public function create () {
        return view('admin.publishers.create');
    }

    public function store (EditoraRequest $request) {
        $new_item = $request->all();
        Editora::create($new_item);

        return redirect()->route('admin.editoras.index');
    }

    public function destroy($id) {
        try {
            Editora::find(Crypt::decrypt($id))->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $item = Editora::find(Crypt::decrypt($request->get('id')));
        return view('admin.publishers.edit', compact('item'));
    }

    public function update(EditoraRequest $request, $id) {
        Editora::find(Crypt::decrypt($id))->update($request->all());
        return redirect()->route('admin.editoras.index');
    }
}
