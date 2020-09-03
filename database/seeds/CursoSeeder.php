<?php

use Illuminate\Database\Seeder;
use App\Curso;
use App\Meta;
use App\Requisito;
use App\Modulo;
use App\Video;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Curso::class, 16)->create()->each(function($curso){
            factory(Meta::class, 4)->create([
                'curso_id' => $curso->id
            ]);

            factory(Requisito::class, 4)->create([
                'curso_id' => $curso->id
            ]);

            factory(Modulo::class, 4)->create([
                'curso_id' => $curso->id
            ])->each(function($modulo){
                factory(Video::class, 5)->create([
                    'modulo_id' => $modulo->id
                ]);
            });
        });
    }
}
