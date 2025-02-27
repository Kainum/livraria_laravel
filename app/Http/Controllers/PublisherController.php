<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PublisherController extends Controller
{

    public function index(Request $request)
    {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Publisher::orderBy('name')->paginate($paginate_value);
        else
            $item_list = Publisher::where('name', 'like', "%$filtragem%")
                ->orderBy('name')
                ->paginate($paginate_value)
                ->setpath('editoras?desc_filtro=' . $filtragem);
        return view('admin.publishers.index', compact('item_list'));
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(PublisherRequest $request)
    {
        $new_item = $request->all();
        Publisher::create($new_item);

        return redirect()->route('admin.publishers.index');
    }

    public function edit($id)
    {
        $item = Publisher::find(Operations::decryptId($id));
        return view('admin.publishers.edit', compact('item'));
    }

    public function update(PublisherRequest $request, $id)
    {
        Publisher::find(Operations::decryptId($id))->update($request->all());
        return redirect()->route('admin.publishers.index');
    }

    public function destroy($id)
    {
        try {
            Publisher::find(Operations::decryptId($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
