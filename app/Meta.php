<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['name', 'curso_id'];
    
    //Relacion uno a muchos inversa
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
