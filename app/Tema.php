<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = ['capitulo_id', 'name', 'body', 'slug', 'title', 'description', 'status'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function capitulo()
    {
        return $this->belongsTo('App\Capitulo');
    }
}
