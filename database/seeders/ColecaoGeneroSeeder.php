<?php

namespace Database\Seeders;

use App\Models\GeneroColecao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColecaoGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([1, 2, 9] as $genero_id) {
            GeneroColecao::create(['colecao_id' => 1, 'genero_id' => $genero_id]);
        }
        foreach ([2, 4, 9, 11] as $genero_id) {
            GeneroColecao::create(['colecao_id' => 2, 'genero_id' => $genero_id]);
        }
        foreach ([1, 9] as $genero_id) {
            GeneroColecao::create(['colecao_id' => 3, 'genero_id' => $genero_id]);
        }
        foreach ([2, 3, 8] as $genero_id) {
            GeneroColecao::create(['colecao_id' => 4, 'genero_id' => $genero_id]);
        }
    }
}
