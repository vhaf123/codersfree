<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* factory(Categoria::class, 1)->create([
            'name' => 'Desarrollo web',
            'slug' => 'desarrollo-web',
            'badge' => 'badge-danger',
            'meta_title' => '▷ Los mejores cursos de Desarrollo Web ¡GRATIS! y en español',
            'meta_description' => 'Encuentra una gran variedad de cursos y proyectos que te convertirán en un experto en el mundo del desarrollo web',
          
            'portada_title' => 'Los mejores cursos de Desarrollo Web ¡GRATIS! y en español',
            'portada_text' => 'Encuentra una gran variedad de cursos y proyectos que te convertirán en un experto en el mundo del desarrollo web',
            'portada_search' => '¿Qué quieres aprender?',
        ]); */

        Categoria::create([
            'name' => 'Desarrollo web',
            'badge' => 'badge-danger',
            'slug' => 'desarrollo-web'
        ]);

        Categoria::create([
            'name' => 'Diseño web',
            'badge' => 'badge-primary',
            'slug' => 'diseño-web'
        ]);

        Categoria::create([
            'name' => 'Programación',
            'badge' => 'badge-success',
            'slug' => 'programacion'
        ]);

    }
}
