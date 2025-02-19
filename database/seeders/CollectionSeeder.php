<?php

namespace Database\Seeders;

use App\Models\Collection;
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
        Collection::create(['nome' => 'Dragon Ball',       'imagem' => 'col-dragon-ball.webp']);
        Collection::create(['nome' => 'Dr. Stone',         'imagem' => 'col-dr-stone.webp']);
        Collection::create(['nome' => 'Spy x Family',      'imagem' => 'col-spy-family.webp']);
        Collection::create(['nome' => 'Harry Potter',      'imagem' => 'col_harry_potter.jpg']);
        // Collection::create(['nome' => 'Turma da Mônica',   'imagem' => 'no-image.webp']);
        // Collection::create(['nome' => 'Naruto',            'imagem' => 'no-image.webp']);
        
    }
}
