<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = "enderecos";
    protected $fillable = [
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'destinatario',
        'telefone',
        'usuario_id',
    ];

    public function cliente() {
        return $this->belongsTo(User::class);
    }
}
