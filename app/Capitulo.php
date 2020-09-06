<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{

    protected $fillable = ['manual_id', 'name'];

    //Relación uno a muchos
    public function temas()
    {
        return $this->hasMany('App\Tema');
    }

    //Relacion uno a muchos inversa
    public function manual()
    {
        return $this->belongsTo('App\Manual');
    }
}
