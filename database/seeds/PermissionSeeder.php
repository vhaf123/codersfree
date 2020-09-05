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
        //Dashboard
        Permission::create([
            'name' => 'Dashboard',
            'slug' => 'admin.index',
            'description' => 'Puede acceder al Dashboard administrativo',
        ]);

        //Páginas
        Permission::create([
            'name' => 'Editar página Home',
            'slug' => 'admin.home',
            'description' => 'Puede modificar el contenido de la página principal',
        ]);

        Permission::create([
            'name' => 'Editar página Cursos',
            'slug' => 'page.cursos',
            'description' => 'Puede modificar el contenido de la página cursos',
        ]);

        Permission::create([
            'name' => 'Editar página blog',
            'slug' => 'page.posts',
            'description' => 'Puede modificar el contenido de la página blog',
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

        //Roles
        Permission::create([
            'name' => 'Lista de roles',
            'slug' => 'admin.roles.index',
            'description' => 'Puede ver la lista de roles',
        ]);

        Permission::create([
            'name' => 'Crear roles',
            'slug' => 'admin.roles.create',
            'description' => 'Puede crear una nueva rol',
        ]);

        Permission::create([
            'name' => 'Editar roles',
            'slug' => 'admin.roles.edit',
            'description' => 'Puede editar un rol',
        ]);

        Permission::create([
            'name' => 'Eliminar roles',
            'slug' => 'admin.roles.destroy',
            'description' => 'Puede eliminar roles',
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

        //Manual
        Permission::create([
            'name' => 'Lista de temas',
            'slug' => 'admin.laravel',
            'description' => 'Puede ver la lista de temas',
        ]);

        Permission::create([
            'name' => 'Crear nuevo tema',
            'slug' => 'admin.temas.create',
            'description' => 'Puede crear una nueva curso',
        ]);

        Permission::create([
            'name' => 'Editar tema',
            'slug' => 'admin.temas.edit',
            'description' => 'Puede editar un tema',
        ]);

        Permission::create([
            'name' => 'Eliminar un tema',
            'slug' => 'admin.temas.destroy',
            'description' => 'Puede eliminar un tema',
        ]);

        //Posts
        Permission::create([
            'name' => 'Lista de posts',
            'slug' => 'admin.posts.index',
            'description' => 'Puede ver la lista de posts',
        ]);

        Permission::create([
            'name' => 'Crear post',
            'slug' => 'admin.posts.create',
            'description' => 'Puede crear una nueva post',
        ]);

        Permission::create([
            'name' => 'Editar post',
            'slug' => 'admin.posts.edit',
            'description' => 'Puede editar una post',
        ]);

        Permission::create([
            'name' => 'Eliminar post',
            'slug' => 'admin.posts.destroy',
            'description' => 'Puede eliminar una post',
        ]);

        //Tags
        Permission::create([
            'name' => 'Lista de tags',
            'slug' => 'admin.tags.index',
            'description' => 'Puede ver la lista de tags',
        ]);

        Permission::create([
            'name' => 'Crear tag',
            'slug' => 'admin.tags.create',
            'description' => 'Puede crear una nueva tag',
        ]);

        Permission::create([
            'name' => 'Editar tag',
            'slug' => 'admin.tags.edit',
            'description' => 'Puede editar una tag',
        ]);

        Permission::create([
            'name' => 'Eliminar tag',
            'slug' => 'admin.tags.destroy',
            'description' => 'Puede eliminar una tag',
        ]);
    }
}
