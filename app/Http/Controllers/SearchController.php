<?php

namespace App\Http\Controllers;

use App\Models\Colecao;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function getLivros (Request $filtro) {
        $paginate_value = 12;

        $filtragem = $filtro->get('pesquisa');
        if ($filtragem == null)
            $list = Livro::orderBy('titulo')->paginate($paginate_value);
        else
            $list = Livro::where('titulo', 'ilike', '%'.$filtragem.'%')
                            ->orderBy('titulo')
                            ->paginate($paginate_value)
                            ->setpath('search?pesquisa='.$filtragem);

        return view('search', ['item_list'=>$list]);
    }

    public function getGeneros () {
        $paginate_value = 12;
        $list = Genero::orderBy('nome')->paginate($paginate_value);

        return view('browse', ['item_list'=>$list]);
    }

    public function getColecoes ($id) {
        $paginate_value = 12;
        $genero = Genero::find($id);
        $list = $genero->colecoes;
        
        return view('browse_colecoes', ['item_list'=>$list]);
    }

    public function view($id) {
        $item = Livro::find($id);
        return view('book_page', compact('item'));
    }

}
