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
        $genres = [
            [
                'name' => 'Ação',
                'image' => 'no-image.webp',
                'slug' => 'acao',
            ],
            [
                'name' => 'Aventura',
                'image' => 'gen_aventura.webp',
                'slug' => 'aventura',
            ],
            [
                'name' => 'Fantasia',
                'image' => 'gen_fantasia.webp',
                'slug' => 'fantasia',
            ],
            [
                'name' => 'Ficção Científica',
                'image' => 'gen_ficcao-cientifica.webp',
                'slug' => 'ficcao-cientifica',
            ],
            [
                'name' => 'Terror',
                'image' => 'no-image.webp',
                'slug' => 'terror',
            ],
            [
                'name' => 'Romance',
                'image' => 'no-image.webp',
                'slug' => 'romance',
            ],
            [
                'name' => 'Suspense',
                'image' => 'no-image.webp',
                'slug' => 'suspense',
            ],
            [
                'name' => 'Mistério',
                'image' => 'gen_misterio.webp',
                'slug' => 'misterio',
            ],
            [
                'name' => 'Comédia',
                'image' => 'gen_comedia.webp',
                'slug' => 'comedia',
            ],
            [
                'name' => 'Histórico',
                'image' => 'gen_historico.webp',
                'slug' => 'historico',
            ],
            [
                'name' => 'Ciências',
                'image' => 'gen_ciencias.webp',
                'slug' => 'ciencias',
            ],
            [
                'name' => 'Tecnologia',
                'image' => 'gen_tecnologia.webp',
                'slug' => 'tecnologia',
            ]
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
