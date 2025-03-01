<?php

namespace App\Http\Controllers;

use App\Models\WishListItem;
use App\Services\Operations;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function view()
    {
        $list = Auth::guard('web')->user()->wishListItems;
        return view('profile.wishlist_page', ['item_list' => $list]);
    }

    public function wishlist_add($id)
    {
        $book_id = Operations::decryptId($id);
        $user_id = Auth::guard('web')->user()->id;

        WishListItem::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'added_date' => date('Y-m-d'),
        ]);
        return redirect()->route('profile.wishlist.index');
    }

    public function wishlist_remove($id)
    {
        $book_id = Operations::decryptId($id);

        WishListItem::find($book_id)->delete();
        return redirect()->route('profile.wishlist.index');
    }
}
