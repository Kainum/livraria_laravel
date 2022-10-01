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
        Colecao::create(['nome' => 'Dragon Ball']);
        Colecao::create(['nome' => 'Dr. Stone']);
        Colecao::create(['nome' => 'Harry Potter']);
        Colecao::create(['nome' => 'Turma da Mônica']);
        Colecao::create(['nome' => 'Naruto']);
        Colecao::create(['nome' => 'Spy x Family']);
    }
}
