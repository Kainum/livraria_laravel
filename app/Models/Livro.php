<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'titulo',
        'resumo',
        'isbn',
        'autor',
        'imagem',
        'data_lancamento',
        'preco',
        'paginas',
        'qtd_estoque',
        'editora_id',
        'colecao_id',
    ];

    public function editora() {
        return $this->belongsTo(Editora::class);
    }

    public function colecao() {
        return $this->belongsTo(Colecao::class);
    }
}
