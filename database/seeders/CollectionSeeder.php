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
        Collection::create(['name' => 'Dragon Ball',       'image' => 'col-dragon-ball.webp']);
        Collection::create(['name' => 'Dr. Stone',         'image' => 'col-dr-stone.webp']);
        Collection::create(['name' => 'Spy x Family',      'image' => 'col-spy-family.webp']);
        Collection::create(['name' => 'Harry Potter',      'image' => 'col_harry_potter.jpg']);
        // Collection::create(['name' => 'Turma da Mônica',   'image' => 'no-image.webp']);
        // Collection::create(['name' => 'Naruto',            'image' => 'no-image.webp']);
        
    }
}
