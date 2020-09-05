<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'blogger_id','categoria_id', 'title', 'description', 'name', 'descripcion', 'body', 'picture', 'status', 'slug', 'contador'
    ];

    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* Query Scopes */
    public function scopeSearch($query, $search){
        if($search){
            return $query->where('name', 'LIKE', '%' . $search . '%');
        }
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
