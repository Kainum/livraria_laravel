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

    public function search (Request $request) {
        $paginate_value = 12;

        $filtragem = $request->get('pesquisa');
        if ($filtragem == null)
            $books = Book::orderBy('product_name')->paginate($paginate_value);
        else
            $books = Book::where('product_name', 'like', "%$filtragem%")
                            ->orderBy('product_name')
                            ->paginate($paginate_value)
                            ->setpath('search?pesquisa='.$filtragem);

        return view('shop.search', compact('books'));
    }

    public function browse () {
        $item_list = Genre::orderBy('name')->get();

        return view('shop.browse', compact('item_list'));
    }

    public function view_collections_from_genre ($slug) {
        $genre = Genre::with('collections')->where('slug', $slug)->firstOrFail();
        
        return view('shop.browse_collections', compact('genre'));
    }

    public function view_books_from_collection($slug) {
        $paginate_value = 12;
        $collection = Collection::where('slug', $slug)->firstOrFail();
        $books = $collection->books()->paginate($paginate_value);
        
        return view('shop.collection_books', compact('collection', 'books'));
    }

    public function view_book($slug) {
        $item = Book::where('slug', $slug)->firstOrFail();
        $wishlist = Auth::guard('web')->user()?->wishListItems->where('book_id', $item->id)->first();

        return view('shop.book_page', compact('item', 'wishlist'));
    }
}
