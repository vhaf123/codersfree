<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['name', 'badge', 'slug'];


    
    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }



    //Relacion uno a muchos
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
}
