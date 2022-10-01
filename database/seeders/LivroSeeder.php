<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $livros = [
            [
                'titulo' => 'Dragon Ball 1',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "drb1.webp",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
            [
                'titulo' => 'Dr. Stone 1',
                'resumo' => 'Em um instante, todos os humanos do mundo viraram pedra. Este acontecimento misterioso envolveu o estudante Taiju e, depois de milhares de anos, ele e o seu amigo Senku despertam e decidem reconstruir a civilização do zero! E assim começa uma grande e única aventura de sobrevivência num mundo de ficção científica!',
                'isbn' => '978-6555124644',
                'autor' => 'Boichi',
                'imagem' => "drs1.webp",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 2,
            ],
            [
                'titulo' => 'Dragon Ball 2',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "https://panini.com.br/media/catalog/product/A/M/AMADR002R.jpg",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
            [
                'titulo' => 'Dragon Ball 3',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "https://panini.com.br/media/catalog/product/A/M/AMADR003R.jpg",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
            [
                'titulo' => 'Dragon Ball 4',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "https://panini.com.br/media/catalog/product/A/M/AMADR004R.jpg",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
            [
                'titulo' => 'Dragon Ball 5',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "https://panini.com.br/media/catalog/product/A/M/AMADR005R.jpg",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
            [
                'titulo' => 'Dragon Ball 6',
                'resumo' => 'Lorem ipsum dolor asit amet',
                'isbn' => '978-6555124644',
                'autor' => 'Akira Toriyama',
                'imagem' => "https://panini.com.br/media/catalog/product/A/M/AMADR006R.jpg",
                'data_lancamento' => "2022-09-20",
                'preco' => 24.99,
                'paginas' => 200,
                'qtd_estoque' => 152,
                'editora_id' => 1,
                'colecao_id' => 1,
            ],
        ];

        foreach ($livros as $key => $value) {
            Livro::create($value);
        }
    }
}
