<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index () {
        $list = Livro::orderBy('titulo')->paginate(5);
        return view('livros.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('livros.create');
    }

    public function store (LivroRequest $request) {
        $new_item = $request->all();
        Livro::create($new_item);

        return redirect()->route('admin.livros');
    }

    public function destroy($id) {
        Livro::find($id)->delete();
        return redirect()->route('admin.livros');
    }

    public function edit($id) {
        $livro = Livro::find($id);
        return view('livros.edit', compact('livro'));
    }

    public function update(LivroRequest $request, $id) {
        Livro::find($id)->update($request->all());
        return redirect()->route('admin.livros');
    }
}
