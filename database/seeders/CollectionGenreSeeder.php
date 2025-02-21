<?php

namespace Database\Seeders;

use App\Models\CollectionGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([1, 2, 9] as $genre_id) {
            CollectionGenre::create(['collection_id' => 1, 'genre_id' => $genre_id]);
        }
        foreach ([2, 4, 9, 11] as $genre_id) {
            CollectionGenre::create(['collection_id' => 2, 'genre_id' => $genre_id]);
        }
        foreach ([1, 9] as $genre_id) {
            CollectionGenre::create(['collection_id' => 3, 'genre_id' => $genre_id]);
        }
        foreach ([2, 3, 8] as $genre_id) {
            CollectionGenre::create(['collection_id' => 4, 'genre_id' => $genre_id]);
        }
    }
}
