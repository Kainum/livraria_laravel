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

class ShopNavigationController extends Controller
{

    public function home() {
        $item_list = Colecao::all()->take(4);
        
        return view('shop.home', compact('item_list'));
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

        return view('shop.search', ['item_list'=>$list]);
    }

    public function browse () {
        $item_list = Genero::orderBy('nome')->get();

        return view('shop.browse', compact('item_list'));
    }

    public function browse_collections ($id) {
        $genre = Genero::with('colecoes')->find(Crypt::decrypt($id));
        
        return view('shop.browse_collections', compact('genre'));
    }

    public function view_collection($id) {
        $paginate_value = 12;
        $collection = Colecao::find(Crypt::decrypt($id));
        $livros = $collection->livros()->paginate($paginate_value);
        
        return view('shop.search', compact('collection', 'livros'));
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
        return view('shop.book_page', compact('item', 'wishlist'));
    }

    


}
