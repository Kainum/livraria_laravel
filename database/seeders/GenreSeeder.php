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
                'name' => 'Ação',
                'image' => 'no-image.webp'
            ],
            [
                'name' => 'Aventura',
                'image' => 'gen_aventura.webp'
            ],
            [
                'name' => 'Fantasia',
                'image' => 'gen_fantasia.webp'
            ],
            [
                'name' => 'Ficção Científica',
                'image' => 'gen_ficcao-cientifica.webp'
            ],
            [
                'name' => 'Terror',
                'image' => 'no-image.webp'
            ],
            [
                'name' => 'Romance',
                'image' => 'no-image.webp'
            ],
            [
                'name' => 'Suspense',
                'image' => 'no-image.webp'
            ],
            [
                'name' => 'Mistério',
                'image' => 'gen_misterio.webp'
            ],
            [
                'name' => 'Comédia',
                'image' => 'gen_comedia.webp'
            ],
            [
                'name' => 'Histórico',
                'image' => 'gen_historico.webp'
            ],
            [
                'name' => 'Ciências',
                'image' => 'gen_ciencias.webp'
            ],
            [
                'name' => 'Tecnologia',
                'image' => 'gen_tecnologia.webp'
            ]
        ];

        foreach ($generos as $genre) {
            Genre::create($genre);
        }
    }
}
