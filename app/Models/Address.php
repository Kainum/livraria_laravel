<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";
    protected $fillable = [
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'destinatario',
        'phone_number',
        'usuario_id',
    ];

    public function cliente() {
        return $this->belongsTo(User::class);
    }
}
