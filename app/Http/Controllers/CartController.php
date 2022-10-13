<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store (Request $request) {
        $product = Livro::find($request->input(key:'product_id'));

    }
}
