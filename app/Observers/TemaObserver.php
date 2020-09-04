<?php

namespace App\Observers;
use App\Tema;

use Illuminate\Support\Str;

class TemaObserver
{
    public function creating(Tema $tema){
        $slug = Str::slug($tema->name, '-');

        $tema->title = $tema->name;
        $tema->slug = $slug;
    }

    public function updating(Tema $tema){
        $slug = Str::slug($tema->name, '-');
        $tema->slug = $slug;
    }
}
