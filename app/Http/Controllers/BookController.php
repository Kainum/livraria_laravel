<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $paginate_value = 10;

        $filtragem = $request->get('desc_filtro');
        if ($filtragem == null)
            $item_list = Book::orderBy('product_name')->paginate($paginate_value);
        else
            $item_list = Book::where('product_name', 'like', "%$filtragem%")
                ->orderBy('product_name')
                ->paginate($paginate_value)
                ->setpath('livros?desc_filtro=' . $filtragem);
        return view('admin.books.index', compact('item_list'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(BookRequest $request)
    {
        $new_item = $request->all();

        if ($request->hasFile('file')) {
            $new_item["image"] = Util::storeFile($request->file('file'));
        } else {
            $new_item["image"] = Util::NO_IMAGE_TEXT;
        }

        Book::create($new_item);
        return redirect()->route('admin.books.index');
    }

    public function edit($id)
    {
        $item = Book::find(Crypt::decrypt($id));
        return view('admin.books.edit', compact('item'));
    }

    public function update(BookRequest $request, $id)
    {
        $updated_item = $request->all();
        $item = Book::find(Crypt::decrypt($id));

        if ($request->hasFile('file')) {
            $updated_item["image"] = Util::updateFile($request->file('file'), $item["image"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        try {
            Book::find(Crypt::decrypt($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
