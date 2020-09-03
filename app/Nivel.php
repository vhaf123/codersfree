<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function cursos()
    {
        return $this->hasMany('App\Cursos');
    }
}
