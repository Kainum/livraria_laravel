<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditoraRequest;
use App\Models\Editora;
use Illuminate\Http\Request;

class EditorasController extends Controller
{

    public function index (Request $filtro) {
        $paginate_value = 10;

        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $list = Editora::orderBy('nome')->paginate($paginate_value);
        else
            $list = Editora::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy('nome')
                            ->paginate($paginate_value)
                            ->setpath('editoras?desc_filtro='.$filtragem);
        return view('editoras.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('editoras.create');
    }

    public function store (EditoraRequest $request) {
        $new_item = $request->all();
        Editora::create($new_item);

        return redirect()->route('admin.editoras');
    }

    public function destroy($id) {
        Editora::find($id)->delete();
        return redirect()->route('admin.editoras');
    }

    public function edit($id) {
        $editora = Editora::find($id);
        return view('editoras.edit', compact('editora'));
    }

    public function update(EditoraRequest $request, $id) {
        Editora::find($id)->update($request->all());
        return redirect()->route('admin.editoras');
    }
}
