<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $table = "genres";
    protected $fillable = [
        'nome',
        'imagem',
    ];

    // public function colecoes() {
    //     return $this->hasMany(GeneroColecao::class);
    // }

    public function colecoes() {
        return $this->belongsToMany(Colecao::class, 'collection_genre', 'genero_id', 'colecao_id');
    }
}
