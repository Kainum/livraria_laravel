<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    protected $table = "publishers";
    protected $fillable = [
        'nome',
    ];

    public function livros() {
        return $this->hasMany(Livro::class);
    }
}
