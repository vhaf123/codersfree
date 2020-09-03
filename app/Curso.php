<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    const BORRADOR = 1;
    const ELABORACION = 2;
    const CULMINADO = 3;

    protected $fillable = [
        'name', 'descripcion','picture', 'title', 'description', 'slug', 'profesor_id', 'categoria_id', 'nivel_id', 'status'
    ];

    protected $withCount = ['metas', 'requisitos', 'modulos', 'videos', 'users', 'reviews'];

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

    public function scopeCategoria($query, $categoria_id){
        if($categoria_id){
            return $query->where('categoria_id', $categoria_id);
        }
    }

    public function scopeNivel($query, $nivel_id){
        if($nivel_id){
            return $query->where('nivel_id', $nivel_id);
        }
    }

    public function scopeStatus($query, $status){
        if($status){
            return $query->where('status', $status);
        }
    }





    /* Atributos */
    public function getRatingAttribute(){

        if($this->reviews_count == 0){
            return 5;
        }else{
            return round($this->reviews->avg('rating'), 2);
        }
        
    }




    /*Relación uno a muchos*/
    public function metas()
    {
        return $this->hasMany('App\Meta');
    }

    public function requisitos()
    {
        return $this->hasMany('App\Requisito');
    }

    public function modulos()
    {
        return $this->hasMany('App\Modulo');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /* Relación uno a muchos inversa */
    public function profesor()
    {
        return $this->belongsTo('App\Profesor');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Nivel');
    }

    /* Relación muchos a muchos */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    /* Relacion Has One Through */
    public function videos()
    {
        return $this->hasManyThrough('App\Video', 'App\Modulo');
    }
}
