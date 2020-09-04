<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'title', 'description', 'name', 'picture', 'extracto', 'body', 'status', 'slug', 'contador'
    ];

    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* Atributos */
    public function getEstadoAttribute(){

        if($this->status == 1){
            return "Borrador";
        }else{
            return "Publicado";
        }
        
    }


    /* Relación uno a muchos inversa */
    public function blogger()
    {
        return $this->belongsTo('App\Blogger');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    /*Relación muchos a muchos*/

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
