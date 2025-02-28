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
        $array = [
            [
                'name' => 'Dragon Ball',
                'image' => 'collections/col-dragon-ball.webp',
                'slug' => 'dragon-ball-3265',
            ],
            [
                'name' => 'Dr. Stone',
                'image' => 'collections/col-dr-stone.webp',
                'slug' => 'dr-stone-5367',
            ],
            [
                'name' => 'Spy x Family',
                'image' => 'collections/col-spy-family.webp',
                'slug' => 'spy-x-family-1234',
            ],
            [
                'name' => 'Harry Potter',
                'image' => 'collections/col-harry-potter.jpg',
                'slug' => 'harry-potter-9954',
            ],
        ];

        foreach($array as $collection) {
            Collection::create($collection);
        }
    }
}
