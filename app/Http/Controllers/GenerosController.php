<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{

    public function getAll () {
        $list = Genero::All();
        return view('generos', ['generos'=>$list]);
    }
}
