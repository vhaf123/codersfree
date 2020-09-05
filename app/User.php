<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\SocialProfile;

use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image(){
        
        $social_profile = $this->socialProfiles->first();

        if($social_profile){
            return $social_profile->social_avatar;
        }else{
            return 'https://picsum.photos/300/300';
        }
        
    }

    public function adminlte_desc(){
        return "Administrador";
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }


    //Relación uno a uno
    public function profesor()
    {
        return $this->hasOne('App\Profesor');
    }

    public function blogger(){
        return $this->hasOne('App\Blogger');
    }

    //Relacion uno a muchos

    public function socialProfiles(){
        return $this->hasMany(SocialProfile::class);
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }


    /* Relación muchos a muchos */

    public function cursos()
    {
        return $this->belongsToMany('App\Curso');
    }

    public function videos()
    {
        return $this->belongsToMany('App\Video');
    }

}
