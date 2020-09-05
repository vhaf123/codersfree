<?php

use App\Blogger;
use Illuminate\Database\Seeder;
use App\User;
use App\Profesor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Victor Arana',
            'email' => 'victor.aranaf92@gmail.com',
            'password' => bcrypt('v54t03123..')
        ]);

        Profesor::create([
            'user_id' => $user->id
        ]);
       
        Blogger::create([
            'user_id' => $user->id
        ]);

        $user->assignRoles('Admin');

        /* factory(User::class, 99)->create(); */
    }
}
