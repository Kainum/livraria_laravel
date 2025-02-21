<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AddressController extends Controller
{
    public function index () {
        $user_id = Auth::guard('web')->user()->id;
        $list = Address::where('usuario_id', '=', $user_id)
                        ->get();

        // dd($list);

        return view('enderecos.index', ['item_list'=>$list]);
    }

    public function create () {
        return view('enderecos.create');
    }

    public function store (AddressRequest $request) {
        $new_item = $request->all();
        $new_item["usuario_id"] = Auth::guard('web')->user()->id;;

        Address::create($new_item);
        return redirect()->route('profile.addresses.index');
    }

    public function destroy($id) {
        try {
            Address::find(Crypt::decrypt($id))->delete();
            $ret = array('status'=>200, 'msg'=>'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request) {
        $item = Address::find(Crypt::decrypt($request->get('id')));
        return view('enderecos.edit', compact('item'));
    }

    public function update(AddressRequest $request, $id) {
        $updated_item = $request->all();

        Address::find(Crypt::decrypt($id))->update($updated_item);
        return redirect()->route('profile.addresses.index');
    }
}
