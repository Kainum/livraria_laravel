<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishListItem;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function view() {
        $list = User::find(1)->wishListItems;
        return view('wishlist', ['item_list'=>$list]);
    }

    public function addWishList($id) {
        $user_id = 1;
        WishListItem::create([
            'user_id'=>$user_id,
            'livro_id'=>$id,
            'data_adicao'=>date('Y-m-d'),
        ]);
        return redirect()->route('wishlist');
    }

    public function removeWishList($id) {
        WishListItem::find($id)->delete();
        return redirect()->route('wishlist');
    }
}
