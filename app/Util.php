<?php

namespace App;

use App\Models\Book;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Util
{

    const IMAGE_DIR     = 'images';
    const NO_IMAGE_TEXT = 'no-image.webp';

    const QTD_MAX_POR_CLIENTE = 3;

    // função para guardar as imagens das entidades
    public static function storeFile(UploadedFile $file) {
        $stored_file = $file->store(self::IMAGE_DIR, 'public');
        return pathinfo($stored_file)['basename'];
    }

    public static function deleteFile(string $file_name) {
        Storage::delete('/'.self::IMAGE_DIR.$file_name);
    }

    public static function updateFile(UploadedFile $file, string $current_file) {
        if (($current_file !== self::NO_IMAGE_TEXT) && (Storage::exists(self::IMAGE_DIR.'/'.$current_file))) {
            self::deleteFile($current_file);    // delete da imagem antiga no storage
        } 
        return self::storeFile($file);          // guarda nova imagem no storage
    }

    public static function formataDinheiro($valor) {
        return number_format($valor, 2, ',', '.');
    }

    public static function updateEstoqueProduto($idProduto, $qtd) {
        $livro = Book::find($idProduto);
        $novo_estoque = $livro['qtd_estoque'] + $qtd;
        $livro->update(['qtd_estoque'=>$novo_estoque]);
    }
}
