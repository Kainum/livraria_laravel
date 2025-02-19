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
        $array = ['JBC', 'Panini', 'Rocco', 'Abril'];

        foreach ($array as $editora) {
            Editora::create([
                'nome' => $editora
            ]);
        }
    }
}
