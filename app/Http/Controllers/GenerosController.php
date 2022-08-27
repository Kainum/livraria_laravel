<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerosController extends Controller
{

    public function index () {
        $nome = "Johnny Depp";
        return view("generos", ['nome'=>$nome]);
    }
}
