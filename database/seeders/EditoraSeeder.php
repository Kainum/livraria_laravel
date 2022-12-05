<?php

namespace Database\Seeders;

use App\Models\Editora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editora::create(['nome' => 'JBC']);
        Editora::create(['nome' => 'Panini']);
        Editora::create(['nome' => 'Rocco']);
    }
}
