<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getAll () {
        $list = Livro::orderBy('titulo')->paginate(6);
        return view('search', ['item_list'=>$list]);
    }

    public function view($id) {
        $item = Livro::find($id);
        return view('book_page', compact('item'));
    }
}
