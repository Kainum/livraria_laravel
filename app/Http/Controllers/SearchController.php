<?php

namespace App\Http\Controllers;

use App\Models\Colecao;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\User;
use App\Models\WishListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SearchController extends Controller
{

    public function homePage() {
        $list = Colecao::find([1,2,3,4,5,6]); // ids das coleções em destaque na página home
        
        return view('home', ['item_list'=>$list]);
    }

    public function getLivros (Request $request) {
        $paginate_value = 12;

        $filtragem = $request->get('pesquisa');
        if ($filtragem == null)
            $list = Livro::orderBy('titulo')->paginate($paginate_value);
        else
            $list = Livro::where('titulo', 'like', "%$filtragem%")
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
        $genero = Genero::find(Crypt::decrypt($id));
        $list = $genero->colecoes;
        
        return view('browse_colecoes', ['item_list'=>$list]);
    }

    public function viewProduto($id) {
        $item_id = Crypt::decrypt($id);
        $wishlist = null;

        if (Auth::guard('web')->check()) {
            $user_id = Auth::guard('web')->user()->id;
            $wishlist = WishListItem::where('user_id', '=', $user_id)
                        ->where('livro_id', '=', $item_id)
                        ->first();
        }
        

        $item = Livro::find($item_id);
        return view('book_page', compact('item'))->with('wishlist', $wishlist);
    }

    public function viewColecao($id) {
        $paginate_value = 12;
        $item_list = Colecao::find(Crypt::decrypt($id))->livros()->paginate($paginate_value);
        
        return view('search', ['item_list'=>$item_list]);
    }


}
