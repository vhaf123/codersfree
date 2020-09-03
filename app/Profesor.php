<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = "profesores";

    protected $fillable = ['user_id', 'title', 'biografia'];

    /* Relación uno a uno inversa */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /* Relación uno a muchos */
    public function cursos()
    {
        return $this->hasMany('App\Curso');
    }
}
