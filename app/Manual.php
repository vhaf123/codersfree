<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    protected $table = 'manuales';

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'creador_id', 'categoria_id', 'name', 'title','descripcion', 'description','slug', 'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relación uno a muchos
    public function temas()
    {
        return $this->hasMany('App\Tema');
    }

    /* Relación uno a muchos inversa */
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
  
}
