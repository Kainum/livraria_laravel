<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CollectionGenre extends Pivot
{
    use HasFactory;

    protected $table = "collection_genre";
    protected $fillable = ['genre_id', 'collection_id',];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function collection() {
        return $this->belongsTo(Collection::class);
    }
}
