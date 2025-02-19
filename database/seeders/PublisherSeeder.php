<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
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
            Publisher::create([
                'nome' => $editora
            ]);
        }
    }
}
