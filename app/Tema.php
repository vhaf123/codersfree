<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = ['capitulo_id', 'name', 'body', 'slug', 'title', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function manual()
    {
        return $this->belongsTo('App\Manual');
    }
}
