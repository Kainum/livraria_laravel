<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecos = [
            [
                'cep'           =>'98240-000',
                'endereco'      =>'Rua 1º de Maio',
                'numero'        =>'150',
                'bairro'        =>'Fátima',
                'cidade'        =>'Santa Bárbara do Sul',
                'uf'            =>'RS',
                'complemento'   =>'Casa',
                'destinatario'  =>'Luciano Elly dos Santos',
                'telefone'      =>'(55) 99207-5062',
                'usuario_id'    =>'1',
            ],
            [
                'cep'           =>'99052-900',
                'endereco'      =>'BR 285 Km 292.7',
                'numero'        =>'1',
                'bairro'        =>'São José',
                'cidade'        =>'Passo Fundo',
                'uf'            =>'RS',
                'complemento'   =>'Campus 1',
                'destinatario'  =>'Universidade de Passo Fundo',
                'telefone'      =>'(54) 3316-8100',
                'usuario_id'    =>'1',
            ],
            [
                'cep'           =>'98240-000',
                'endereco'      =>'Rua Abegay Vieira',
                'numero'        =>'658',
                'bairro'        =>'Morada do Sol',
                'cidade'        =>'Santa Bárbara do Sul',
                'uf'            =>'RS',
                'complemento'   =>'Casa',
                'destinatario'  =>'Luciano Elly dos Santos',
                'telefone'      =>'(55) 99207-5062',
                'usuario_id'    =>'2',
            ],
            
        ];

        foreach ($enderecos as $key => $value) {
            Endereco::create($value);
        }
    }
}
