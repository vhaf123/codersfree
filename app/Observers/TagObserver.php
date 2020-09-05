<?php

namespace App\Observers;

use App\Tag;
use Illuminate\Support\Str;

class TagObserver
{
    public function creating(Tag $tag){
        $slug = Str::slug($tag->name, '-');
        
        $tag->slug = $slug;
    }

    public function updating(Tag $tag){
        $slug = Str::slug($tag->name, '-');
        
        $tag->slug = $slug;
    }
}
