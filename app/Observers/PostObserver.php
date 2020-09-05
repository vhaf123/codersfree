<?php

namespace App\Observers;
use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post){
        $slug = Str::slug($post->name, '-');

        $post->title = $post->name;
        $post->description = $post->descripcion;
        $post->slug = $slug;

        if(! \App::runningInConsole()){
            $post->blogger_id = auth()->user()->blogger->id;    
        }
    }

    public function updating(Post $post){
        $slug = Str::slug($post->name, '-');
        $post->slug = $slug;
    }
}
