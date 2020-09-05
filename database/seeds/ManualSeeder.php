<?php

use App\Manual;
use App\Tema;
use Illuminate\Database\Seeder;

class ManualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manual =  Manual::Create([
            'categoria_id' => 1,
            'name' => 'Documentación de Laravel 7 en español',
            'descripcion' => "Hemos traducido la documentación oficial de Laravel 7, para ayudarte en tu proceso de aprendizaje",
            'status' => 2
        ]);

        /* factory(Tema::class, 25)->create([
            'manual_id' => $manual->id
        ]); */
    }
}
