<?php

use Illuminate\Database\Seeder;
use App\CursoPage;

class CursoPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CursoPage::class, 1)->create([
            'meta_title' => '▷ Domina la tecnología web con Coders Free',
            'meta_description' => 'Si estás buscando aprender una nueva tecnología, has llegado al lugar adecuado.',
            'portada_title' => 'Domina la tecnología web con Coders Free',
            'portada_text' => 'Si estás buscando aprender una nueva tecnología, has llegado al lugar adecuado.',
            'portada_search' => '¿Qué quieres aprender?',
        ]);
    }
}
