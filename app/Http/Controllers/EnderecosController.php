<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EnderecosController extends Controller
{
    public function index () {
        $user_id = Auth::guard('web')->user()->id;
        $list = Endereco::where('usuario_id', '=', $user_id)
                        ->get();

        //dd($list);

        return view('enderecos.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('enderecos.create');
    }

    public function store (EnderecoRequest $request) {
        $new_item = $request->all();
        $new_item["usuario_id"] = Auth::guard('web')->user()->id;;

        Endereco::create($new_item);
        return redirect()->route('enderecos');
    }

    public function destroy($id) {
        Endereco::find(Crypt::decrypt($id))->delete();
        return redirect()->route('enderecos');
    }

    public function edit(Request $request) {
        $item = Endereco::find(Crypt::decrypt($request->get('id')));
        return view('enderecos.edit', compact('item'));
    }

    public function update(EnderecoRequest $request, $id) {
        $updated_item = $request->all();

        Endereco::find(Crypt::decrypt($id))->update($updated_item);
        return redirect()->route('enderecos');
    }
}
