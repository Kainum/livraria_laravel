<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $stored_file = $request->file('file')->store('livros', 'public');
        $new_item["imagem"] = pathinfo($stored_file)['basename'];

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
        $updated_item = $request->all();

        dd($request->file('file'));
        if ($request->hasFile('file')) {
            if (Storage::exists('livros/'.$updated_item["imagem"])) {
                Storage::delete('livros/'.$updated_item["imagem"]);             // delete da imagem antiga no storage
            }
            $stored_file = $request->file('file')->store('livros', 'public');   // guarda nova imagem no storage
            $updated_item["imagem"] = pathinfo($stored_file)['basename'];
        }

        Livro::find($id)->update($updated_item);
        //return redirect()->route('admin.livros');
    }
}