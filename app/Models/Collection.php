<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = "collections";
    protected $fillable = [
        'name',
        'image',
        'slug',
    ];

    public function books() {
        return $this->hasMany(Book::class, 'collection_id');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'collection_genre', 'collection_id', 'genre_id')->using(CollectionGenre::class);
    }
}
