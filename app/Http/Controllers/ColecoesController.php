<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColecaoRequest;
use App\Models\Colecao;
use Illuminate\Http\Request;

class ColecoesController extends Controller
{
    public function index () {
        $list = Colecao::orderBy('nome')->paginate(5);
        return view('colecoes.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('colecoes.create');
    }

    public function store (ColecaoRequest $request) {
        $new_item = $request->all();
        Colecao::create($new_item);

        return redirect()->route('admin.colecoes');
    }

    public function destroy($id) {
        Colecao::find($id)->delete();
        return redirect()->route('admin.colecoes');
    }

    public function edit($id) {
        $colecao = Colecao::find($id);
        return view('colecoes.edit', compact('colecao'));
    }

    public function update(ColecaoRequest $request, $id) {
        Colecao::find($id)->update($request->all());
        return redirect()->route('admin.colecoes');
    }
}
