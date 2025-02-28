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
                'slug' => 'acao',
            ],
            [
                'name' => 'Aventura',
                'image' => 'genres/gen_aventura.webp',
                'slug' => 'aventura',
            ],
            [
                'name' => 'Fantasia',
                'image' => 'genres/gen_fantasia.webp',
                'slug' => 'fantasia',
            ],
            [
                'name' => 'Ficção Científica',
                'image' => 'genres/gen_ficcao-cientifica.webp',
                'slug' => 'ficcao-cientifica',
            ],
            [
                'name' => 'Terror',
                'slug' => 'terror',
            ],
            [
                'name' => 'Romance',
                'slug' => 'romance',
            ],
            [
                'name' => 'Suspense',
                'slug' => 'suspense',
            ],
            [
                'name' => 'Mistério',
                'image' => 'genres/gen_misterio.webp',
                'slug' => 'misterio',
            ],
            [
                'name' => 'Comédia',
                'image' => 'genres/gen_comedia.webp',
                'slug' => 'comedia',
            ],
            [
                'name' => 'Histórico',
                'image' => 'genres/gen_historico.webp',
                'slug' => 'historico',
            ],
            [
                'name' => 'Ciências',
                'image' => 'genres/gen_ciencias.webp',
                'slug' => 'ciencias',
            ],
            [
                'name' => 'Tecnologia',
                'image' => 'genres/gen_tecnologia.webp',
                'slug' => 'tecnologia',
            ]
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
