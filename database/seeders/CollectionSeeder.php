<?php

namespace Database\Seeders;

use App\Models\Colecao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colecao::create(['nome' => 'Dragon Ball',       'imagem' => 'col-dragon-ball.webp']);
        Colecao::create(['nome' => 'Dr. Stone',         'imagem' => 'col-dr-stone.webp']);
        Colecao::create(['nome' => 'Spy x Family',      'imagem' => 'col-spy-family.webp']);
        Colecao::create(['nome' => 'Harry Potter',      'imagem' => 'col_harry_potter.jpg']);
        // Colecao::create(['nome' => 'Turma da Mônica',   'imagem' => 'no-image.webp']);
        // Colecao::create(['nome' => 'Naruto',            'imagem' => 'no-image.webp']);
        
    }
}
