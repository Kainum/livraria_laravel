<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneroRequest;
use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{

    public function index () {
        $list = Genero::All();
        return view('generos.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('generos.create');
    }

    public function store (GeneroRequest $request) {
        $new_item = $request->all();
        Genero::create($new_item);

        return redirect()->route('admin.generos');
    }

    public function destroy($id) {
        Genero::find($id)->delete();
        return redirect()->route('admin.generos');
    }

    public function edit($id) {
        $genero = Genero::find($id);
        return view('generos.edit', compact('genero'));
    }

    public function update(GeneroRequest $request, $id) {
        Genero::find($id)->update($request->all());
        return redirect()->route('admin.generos');
    }
}
