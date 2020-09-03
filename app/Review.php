<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'curso_id', 'user_id', 'rating', 'comentario'
    ];

    /* Relación uno a muchos inversa */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
