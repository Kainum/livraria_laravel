<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{

    public function index () {
        $list = Genero::All();
        return view('generos.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('generos.create');
    }
}
