<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user)
    {

        $slug = Str::slug($user->name, '');

        while (User::where('slug', $slug)->count()) {
            $slug = $slug.rand(1,1000);
        }

        $user->slug = $slug;
    }
}
