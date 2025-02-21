<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'titulo',
        'resumo',
        'isbn',
        'autor',
        'image',
        'data_lancamento',
        'preco',
        'paginas',
        'qtd_estoque',
        'publisher_id',
        'collection_id',
    ];

    public function editora() {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function colecao() {
        return $this->belongsTo(Collection::class, 'collection_id');
    }
}
