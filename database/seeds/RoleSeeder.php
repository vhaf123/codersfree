<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
                'name' => 'Admin',
                'slug' => 'Admin',
                'description' => 'Acceso total',
            ]);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $admin->permissions()->attach($permission->id);
        }

        /* Role::create([
            'name' => 'Admin',
            'slug' => 'Admin',
            'description' => 'Acceso total',
        ])->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

        Role::create([
            'name' => 'Profesor',
            'slug' => 'Profesor',
            'description' => 'Puede crear cursos, editarlos y eliminarlos',
        ])->permissions()->attach([1, 8, 9, 10, 11]); */
    }
}
