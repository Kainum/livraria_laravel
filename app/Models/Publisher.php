<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = "publishers";
    protected $fillable = [
        'nome',
    ];

    public function livros() {
        return $this->hasMany(Book::class, 'editora_id');
    }
}
