<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Elimina carpeta de imagenes
        Storage::deleteDirectory('home');
        Storage::deleteDirectory('cursos');
        Storage::deleteDirectory('posts');
        
        //crea carpeta de imagenes
        Storage::makeDirectory('home');
        Storage::makeDirectory('cursos');
        Storage::makeDirectory('posts');

        //Ejecuta seeder
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(HomeSeeder::class);
        $this->call(PageCursoSeeder::class);
        $this->call(PagePostSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(ManualSeeder::class);
        
        /* $this->call(CursoSeeder::class);
        $this->call(ManualSeeder::class); */
        
        $this->call(TagSeeder::class);
        /* $this->call(PostSeeder::class); */
    }
}
