<?php

namespace App\Observers;
use App\Capitulo;

use Illuminate\Support\Str;

class CapituloObserver
{
    public function creating(Capitulo $capitulo){
        $slug = Str::slug($capitulo->name, '-');

        $capitulo->slug = $slug;
    }
}
