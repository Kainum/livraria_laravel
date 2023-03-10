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
        GeneroColecao::create(['colecao_id'=>1,'genero_id'=>1]);
        GeneroColecao::create(['colecao_id'=>1,'genero_id'=>2]);
        GeneroColecao::create(['colecao_id'=>1,'genero_id'=>9]);

        GeneroColecao::create(['colecao_id'=>2,'genero_id'=>2]);
        GeneroColecao::create(['colecao_id'=>2,'genero_id'=>4]);
        GeneroColecao::create(['colecao_id'=>2,'genero_id'=>9]);
        GeneroColecao::create(['colecao_id'=>2,'genero_id'=>11]);

        GeneroColecao::create(['colecao_id'=>3,'genero_id'=>1]);
        GeneroColecao::create(['colecao_id'=>3,'genero_id'=>9]);

        GeneroColecao::create(['colecao_id'=>4,'genero_id'=>2]);
        GeneroColecao::create(['colecao_id'=>4,'genero_id'=>3]);
        GeneroColecao::create(['colecao_id'=>4,'genero_id'=>8]);
    }
}
