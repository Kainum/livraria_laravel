<?php

namespace Database\Seeders;

use App\Models\Colecao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colecao::create(['nome' => 'Dragon Ball', 'imagem' => 'no-image.webp']);
        Colecao::create(['nome' => 'Dr. Stone', 'imagem' => 'no-image.webp']);
        Colecao::create(['nome' => 'Spy x Family', 'imagem' => 'no-image.webp']);
        Colecao::create(['nome' => 'Harry Potter', 'imagem' => 'no-image.webp']);
        Colecao::create(['nome' => 'Turma da Mônica', 'imagem' => 'no-image.webp']);
        Colecao::create(['nome' => 'Naruto', 'imagem' => 'no-image.webp']);
        
    }
}
