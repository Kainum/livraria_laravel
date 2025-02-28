<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Services\Operations;
use Illuminate\Http\Request;

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
        $request->merge([
            'collection_id' => Operations::decryptId($request->collection_id),
            'publisher_id' => Operations::decryptId($request->publisher_id),
        ]);
        $new_item = $request->all();

        // guarda a image do upload
        if ($request->hasFile('file')) {
            $new_item["image"] = Operations::storeFile($request->file('file'), 'books');
        }

        Book::create($new_item);
        return redirect()->route('admin.books.index');
    }

    public function edit($id)
    {
        $item = Book::find(Operations::decryptId($id));
        return view('admin.books.edit', compact('item'));
    }

    public function update(BookRequest $request, $id)
    {
        $request->merge([
            'collection_id' => Operations::decryptId($request->collection_id),
            'publisher_id' => Operations::decryptId($request->publisher_id),
        ]);
        $updated_item = $request->all();
        $item = Book::find(Operations::decryptId($id));

        if ($request->hasFile('file')) {
            $updated_item["image"] = Operations::updateFile($request->file('file'), 'books', $item["image"]);
        }

        $item->update($updated_item);
        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        try {
            Book::find(Operations::decryptId($id))->delete();
            $ret = array('status' => 200, 'msg' => 'null');
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
