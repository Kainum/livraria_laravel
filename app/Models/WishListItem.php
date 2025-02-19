<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListItem extends Model
{
    use HasFactory;

    protected $table = "wishlist_item";
    protected $fillable = ['user_id', 'livro_id', 'data_adicao'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function livro() {
        return $this->belongsTo(Book::class);
    }
}
