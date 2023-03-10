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
        return view('wishlist', ['item_list'=>$list]);
    }

    public function addWishList($id) {
        $user_id = Auth::guard('web')->user()->id;
        WishListItem::create([
            'user_id'=>$user_id,
            'livro_id'=>Crypt::decrypt($id),
            'data_adicao'=>date('Y-m-d'),
        ]);
        return redirect()->route('wishlist');
    }

    public function removeWishList($id) {
        WishListItem::find(Crypt::decrypt($id))->delete();
        return redirect()->route('wishlist');
    }
}
