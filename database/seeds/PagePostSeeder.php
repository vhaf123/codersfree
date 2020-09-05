<?php

use Illuminate\Database\Seeder;
use App\PagePost;

class PagePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PagePost::class, 1)->create([
            'meta_title' => '▷ Blog de programación e informática.',
            'meta_description' => 'Encuentra los mejores post de programación y desarrollo web. Nuevo contenido todos los días.',
            'portada_title' => '¿Estás buscando algún artículo en particular?',
            'portada_text' => 'Encuentra los mejores post de programación y desarrollo web. Nuevo contenido todos los días.',
            'portada_search' => 'Escribe el nombre de un artículo',
        ]);
    }
}
