<?php

namespace App\Policies;

use App\User;
use App\Curso;
use App\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function matriculado(User $user, Curso $curso){
        return $curso->users->contains($user->id);
    }

    public function valorado(User $user, Curso $curso){

        if(Review::where('user_id', $user->id)->where('curso_id', $curso->id)->count()){
            return true;
        }else{
            return false;
        }

    }

    public function dictado(User $user, Curso $curso){
        if($curso->profesor_id == $user->profesor->id){
            return true;
        }else{
            return false;
        }
    }
}
