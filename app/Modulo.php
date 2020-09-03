<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = ['curso_id', 'name'];

    /*Relación uno a muchos*/
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    //Relacion uno a muchos inversa
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
