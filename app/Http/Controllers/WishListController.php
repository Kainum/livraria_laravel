<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class WishListController extends Controller
{
    public function view() {
        $list = Auth::guard('web')->user()->wishListItems;
        return view('profile.wishlist_page', ['item_list'=>$list]);
    }

    public function wishlist_add($id) {
        $user_id = Auth::guard('web')->user()->id;
        WishListItem::create([
            'user_id'=>$user_id,
            'book_id'=>Crypt::decrypt($id),
            'added_date'=>date('Y-m-d'),
        ]);
        return redirect()->route('profile.wishlist.index');
    }

    public function wishlist_remove($id) {
        WishListItem::find(Crypt::decrypt($id))->delete();
        return redirect()->route('profile.wishlist.index');
    }
}
