<?php

namespace Database\Seeders;

use App\Models\Collection;
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
                'genres' => [1, 2, 9],
            ],
            [
                'name' => 'Dr. Stone',
                'image' => 'collections/col-dr-stone.webp',
                'slug' => 'dr-stone-5367',
                'genres' => [2, 4, 9, 11],
            ],
            [
                'name' => 'Spy x Family',
                'image' => 'collections/col-spy-family.webp',
                'slug' => 'spy-x-family-1234',
                'genres' => [1, 9],
            ],
            [
                'name' => 'Harry Potter',
                'image' => 'collections/col-harry-potter.jpg',
                'slug' => 'harry-potter-9954',
                'genres' => [2, 3, 8],
            ],
        ];

        foreach($array as $collection) {
            Collection::create([
                'name' => $collection['name'],
                'image' => $collection['image'],
                'slug' => $collection['slug'],
            ])->genres()->sync($collection['genres']);
        }
    }
}
