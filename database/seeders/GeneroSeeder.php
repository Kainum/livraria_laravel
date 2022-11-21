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
        Genero::create(['nome' => 'Ação', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Aventura', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Fantasia', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Ficção Científica', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Terror', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Romance', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Suspense', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Mistério', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Infantil', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Comédia', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Gastronomia', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Arte', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Biografia', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Histórico', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Guia', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Religião', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Ciências', 'imagem' => 'no-image.webp']);
        Genero::create(['nome' => 'Tecnologia', 'imagem' => 'no-image.webp']);
    }
}
