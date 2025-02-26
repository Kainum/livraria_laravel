<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'product_name',
        'synopsis',
        'isbn',
        'author',
        'image',
        'slug',
        'release_date',
        'price',
        'page_number',
        'qty_in_stock',
        'publisher_id',
        'collection_id',
    ];

    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function collection() {
        return $this->belongsTo(Collection::class, 'collection_id');
    }
}
