<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Laravel',
            'background' => 'badge-danger'
        ]);

        Tag::create([
            'name' => 'Sass',
            'background' => 'badge-dark'
        ]);

        Tag::create([
            'name' => 'Programación',
            'background' => 'badge-warning'
        ]);
    }
}
