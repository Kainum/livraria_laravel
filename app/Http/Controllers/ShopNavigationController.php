<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Genre;
use App\Models\Book;
use App\Models\WishListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ShopNavigationController extends Controller
{

    public function home() {
        $item_list = Collection::all()->take(4);
        
        return view('shop.home', compact('item_list'));
    }

    public function getLivros (Request $request) {
        $paginate_value = 12;

        $filtragem = $request->get('pesquisa');
        if ($filtragem == null)
            $livros = Book::orderBy('product_name')->paginate($paginate_value);
        else
            $livros = Book::where('product_name', 'like', "%$filtragem%")
                            ->orderBy('product_name')
                            ->paginate($paginate_value)
                            ->setpath('search?pesquisa='.$filtragem);

        return view('shop.search', compact('livros'));
    }

    public function browse () {
        $item_list = Genre::orderBy('name')->get();

        return view('shop.browse', compact('item_list'));
    }

    public function browse_collections ($id) {
        $genre = Genre::with('colecoes')->find(Crypt::decrypt($id));
        
        return view('shop.browse_collections', compact('genre'));
    }

    public function view_collection($id) {
        $paginate_value = 12;
        $collection = Collection::find(Crypt::decrypt($id));
        $livros = $collection->livros()->paginate($paginate_value);
        
        return view('shop.collection_books', compact('collection', 'livros'));
    }

    public function viewProduto($id) {
        $item_id = Crypt::decrypt($id);
        $wishlist = null;

        if (Auth::guard('web')->check()) {
            $user_id = Auth::guard('web')->user()->id;
            $wishlist = WishListItem::where('user_id', '=', $user_id)
                        ->where('book_id', '=', $item_id)
                        ->first();
        }
        
        $item = Book::find($item_id);
        return view('shop.book_page', compact('item', 'wishlist'));
    }
}
