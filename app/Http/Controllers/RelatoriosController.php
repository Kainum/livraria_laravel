<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Book;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public function relatorioEstoque()
    {
        return view('admin.relatorios.rel_estoque');
    }

    public function gerarRelEstoque(Request $request)
    {
        $maxResults = $request->maxResults;
        $allZero    = isset($request->allZero);

        if ($allZero) {
            $result = Book::where('qty_in_stock', 0)->orderBy('product_name')->get();
        } else {
            $result = Book::orderBy('qty_in_stock')->get();
        }

        if ($maxResults > 0) {
            $result = $result->take($maxResults);
        }

        return view('admin.relatorios.results.qtd_estoque', compact('result'));
    }

    // ==============================================================

    public function relatorioVendasPeriodo()
    {
        return view('admin.relatorios.rel_qtd_vendas_periodo');
    }

    public function gerarRelVendasPeriodo(Request $request)
    {

        $dataInicio = $request->dataInicio;
        $dataFim    = $request->dataFim;


        $items = OrderProduct::select('book_id', 'quantity')->whereHas('pedido', function ($q) use ($dataInicio, $dataFim) {
            $q->whereBetween('order_date', [$dataInicio, $dataFim])->whereNot('status', OrderStatusEnum::CART);
        })->orderBy('book_id')->get();

        $result = [];
        foreach ($items as $item) {
            if (!isset($result[$item->book_id])) {
                $result[$item->book_id] = 0;
            }
            $result[$item->book_id] = $result[$item->book_id] + $item->quantity;
        }

        return view('admin.relatorios.results.mais_vendidos', compact('result', 'dataInicio', 'dataFim'));
    }
}
