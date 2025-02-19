<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = "collections";
    protected $fillable = [
        'nome',
        'imagem',
    ];

    public function livros() {
        return $this->hasMany(Book::class, 'colecao_id');
    }

    public function generos() {
        return $this->belongsToMany(Genre::class, 'collection_genre', 'colecao_id', 'genero_id');
    }
}
