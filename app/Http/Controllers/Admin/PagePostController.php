<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PagePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PagePostController extends Controller
{
    
    public function __construct(){
        $this->middleware(['can:page.posts']);
    }


    public function index()
    {
        $page_post = PagePost::first();
        return view('admin.pagePosts.index', compact('page_post'));
    }

   
    public function update(Request $request, PagePost $page_post)
    {
        $request->validate([
            'portada_title' => 'required',
            'portada_text' => 'required',
            'portada_search' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);

        $resultado = $request->all();

        if($request->file('picture')){
            
            Storage::delete($page_post->picture);
            $resultado['picture'] = Storage::put('posts', $request->file('picture'));
            
        }

        $page_post->update($resultado);

        return redirect()->route('page.posts.index')->with('info', 'La página blog fue actualizado con éxito');
    }

  
}
