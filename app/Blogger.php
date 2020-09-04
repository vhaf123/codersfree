<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogger extends Model
{
    protected $fillable = [
        'user_id', 'title', 'biografia', 'website_url'
    ];

    /* Relación uno a uno inversa */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /* Relación uno a muchos */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
