<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = "genres";
    protected $fillable = [
        'name',
        'image',
    ];

    public function colecoes() {
        return $this->belongsToMany(Collection::class, 'collection_genre', 'genre_id', 'collection_id');
    }
}
