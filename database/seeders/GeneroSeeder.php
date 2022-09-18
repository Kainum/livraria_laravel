<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create(['nome' => 'Ação', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Aventura', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Fantasia', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Ficção Científica', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Terror', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Romance', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Suspense', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Mistério', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Infantil', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Comédia', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Gastronomia', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Arte', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Biografia', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Histórico', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Guia', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Religião', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Ciências', 'imagem' => '12345.png']);
        Genero::create(['nome' => 'Tecnologia', 'imagem' => '12345.png']);
    }
}
