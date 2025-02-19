<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
            [
                'nome' => 'Ação',
                'imagem' => 'no-image.webp'
            ],
            [
                'nome' => 'Aventura',
                'imagem' => 'gen_aventura.webp'
            ],
            [
                'nome' => 'Fantasia',
                'imagem' => 'gen_fantasia.webp'
            ],
            [
                'nome' => 'Ficção Científica',
                'imagem' => 'gen_ficcao-cientifica.webp'
            ],
            [
                'nome' => 'Terror',
                'imagem' => 'no-image.webp'
            ],
            [
                'nome' => 'Romance',
                'imagem' => 'no-image.webp'
            ],
            [
                'nome' => 'Suspense',
                'imagem' => 'no-image.webp'
            ],
            [
                'nome' => 'Mistério',
                'imagem' => 'gen_misterio.webp'
            ],
            [
                'nome' => 'Comédia',
                'imagem' => 'gen_comedia.webp'
            ],
            [
                'nome' => 'Histórico',
                'imagem' => 'gen_historico.webp'
            ],
            [
                'nome' => 'Ciências',
                'imagem' => 'gen_ciencias.webp'
            ],
            [
                'nome' => 'Tecnologia',
                'imagem' => 'gen_tecnologia.webp'
            ]
        ];

        foreach ($generos as $genero) {
            Genre::create($genero);
        }
    }
}
