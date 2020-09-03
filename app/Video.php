<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['modulo_id', 'name', 'descripcion', 'url' ,'iframe'];

    //Relacion uno a muchos inversa
    public function modulo()
    {
        return $this->belongsTo('App\Modulo');
    }

    /* Relación muchos a muchos */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
