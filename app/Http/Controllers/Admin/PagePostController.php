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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_post = PagePost::first();
        return view('admin.pagePosts.index', compact('page_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

            if($page_post->picture){
                Storage::delete($page_post->picture);
            }

            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\posts/" . $nombre;

            Image::make($request->file('picture'))
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['picture'] = 'posts/' . $nombre;
        }

        $page_post->update($resultado);

        return redirect()->route('page.posts.index')->with('info', 'La página blog fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
