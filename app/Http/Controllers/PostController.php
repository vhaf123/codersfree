<?php

namespace App\Http\Controllers;

use App\PagePost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');

        $pagePost = PagePost::first();

        $posts =Post::where('status', '!=', 1)
                    ->search($search)
                    ->latest()
                    ->paginate(13);

        $populares = Post::where('status', '!=', 1)
                    ->latest('contador')
                    ->get()
                    ->take(6);

        return view('posts.index', compact('pagePost','posts', 'populares'));
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
    public function show(Post $post)
    {

        if($post->status == 1){

            abort(403, 'This action is unauthorized.');

        }else{

            $categoria = $post->categoria;
        
            $similares = $categoria->posts()
                                ->orderBy('contador', 'desc')
                                ->where('id', '<>', $post->id)
                                ->latest('id')
                                ->take(5)
                                ->get();
            $ultimos = Post::latest('id')
                            ->where('id', '<>', $post->id)
                            ->take(5)
                            ->get();

            $contador = $post->contador;
            $contador++;

            $post->update([
                    'contador' => $contador
            ]);

            return view('posts.show', compact('post', 'similares', 'ultimos'));
        }
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
    public function update(Request $request, $id)
    {
        //
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
