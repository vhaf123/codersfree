<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = ['manual_id','capitulo', 'name', 'body', 'slug', 'title', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function manual()
    {
        return $this->belongsTo('App\Manual');
    }
}
