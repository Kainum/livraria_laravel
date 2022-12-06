<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{
    use HasFactory;

    protected $table = "colecoes";
    protected $fillable = [
        'nome',
        'imagem',
    ];

    public function livros() {
        return $this->hasMany(Livro::class);
    }

    public function generos() {
        return $this->hasMany(GeneroColecao::class);
    }
}
