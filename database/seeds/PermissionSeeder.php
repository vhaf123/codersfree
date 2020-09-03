<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Dashboard',
            'slug' => 'admin.index',
            'description' => 'Puede acceder al Dashboard administrativo',
        ]);

        //Usuarios
        Permission::create([
            'name' => 'Lista de usuarios',
            'slug' => 'admin.users.index',
            'description' => 'Puede ver la lista de usuarios',
        ]);

        Permission::create([
            'name' => 'Asignar rol a usuarios',
            'slug' => 'admin.users.edit',
            'description' => 'Puede asignar un determinado rol a un usuario',
        ]);

        //Categorias
        Permission::create([
            'name' => 'Lista de categorias',
            'slug' => 'admin.categorias.index',
            'description' => 'Puede ver la lista de categorías',
        ]);

        Permission::create([
            'name' => 'Crear categoría',
            'slug' => 'admin.categorias.create',
            'description' => 'Puede crear una nueva categoría',
        ]);

        Permission::create([
            'name' => 'Editar categoría',
            'slug' => 'admin.categorias.edit',
            'description' => 'Puede editar una categoría',
        ]);

        Permission::create([
            'name' => 'Eliminar categoría',
            'slug' => 'admin.categorias.destroy',
            'description' => 'Puede eliminar una categoría',
        ]);

        //Cursos

        Permission::create([
            'name' => 'Lista de cursos',
            'slug' => 'admin.cursos.index',
            'description' => 'Puede ver la lista de cursos',
        ]);

        Permission::create([
            'name' => 'Crear curso',
            'slug' => 'admin.cursos.create',
            'description' => 'Puede crear una nueva curso',
        ]);

        Permission::create([
            'name' => 'Editar curso',
            'slug' => 'admin.cursos.edit',
            'description' => 'Puede editar una curso',
        ]);

        Permission::create([
            'name' => 'Eliminar curso',
            'slug' => 'admin.cursos.destroy',
            'description' => 'Puede eliminar una curso',
        ]);
    }
}
