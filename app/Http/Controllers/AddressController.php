<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function create()
    {
        return view('profile.addresses.create');
    }

    public function store(AddressRequest $request)
    {
        $new_item = $request->all();
        $new_item["usuario_id"] = Auth::guard('web')->user()->id;;

        Address::create($new_item);
        return redirect()->route('profile.view');
    }

    public function edit(Request $request)
    {
        $id = Operations::decryptId($request->id);
        $item = Address::find($id);
        return view('profile.addresses.edit', compact('item'));
    }

    public function update(AddressRequest $request, $id)
    {
        $id = Operations::decryptId($id);

        Address::find($id)->update($request->all());
        return redirect()->route('profile.view');
    }

    public function destroy($id)
    {
        try {
            Address::find(Operations::decryptId($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
