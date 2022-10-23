<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroColecao extends Model
{
    use HasFactory;

    protected $table = "genero_colecoes";
    protected $fillable = ['genero_id', 'colecao_id',];

    public function genero() {
        return $this->belongsTo(Genero::class);
    }

    public function colecao() {
        return $this->belongsTo(Colecao::class);
    }
}
