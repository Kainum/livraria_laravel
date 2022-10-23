<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColecaoRequest;
use App\Models\Colecao;
use App\Models\GeneroColecao;
use Illuminate\Http\Request;

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


        $new_item = Colecao::create(['nome'=>$request->get('nome'),]);
        $generos = $request->generos;

        foreach($generos as $gen => $value) {
            GeneroColecao::create([
                                'genero_id'=>$generos[$gen],
                                'colecao_id'=>$new_item->id,
                                ]);
        }

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
