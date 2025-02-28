<?php

namespace App;

use App\Models\Book;

class Util
{
    const QTD_MAX_POR_CLIENTE = 3;

    public static function updateEstoqueProduto($idProduto, $qtd) {
        $livro = Book::find($idProduto);
        $novo_estoque = $livro['qty_in_stock'] + $qtd;
        $livro->update(['qty_in_stock'=>$novo_estoque]);
    }
}
