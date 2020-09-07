<?php

namespace App\Observers;
use App\Curso;
use Illuminate\Support\Str;

class CursoObserver
{
    public function creating(Curso $curso)
    {

        $slug = Str::slug($curso->name, '-');

        $curso->slug = $slug;
        $curso->title = $curso->name;
        $curso->description = $curso->descripcion;

        if(! \App::runningInConsole()){
            $curso->profesor_id = auth()->user()->profesor->id;    
        }

    }

    public function updating(Curso $curso){
        $slug = Str::slug($curso->name, '-');
        $curso->slug = $slug;
    }
}
