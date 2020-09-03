<?php

use App\PageCurso;
use Illuminate\Database\Seeder;

class PageCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PageCurso::class, 1)->create([
            'meta_title' => '▷ Los mejores cursos de programación ¡GRATIS! y en español.',
            'meta_description' => 'Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso',
            'portada_title' => ' Los mejores cursos de programación ¡GRATIS! y en español.',
            'portada_text' => 'Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso',
            'portada_search' => '¿Qué quieres aprender?',
        ]);
    }
}
