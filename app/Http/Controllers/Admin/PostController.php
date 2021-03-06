<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.posts.index'])->only('index');
        $this->middleware(['can:admin.posts.create'])->only('create', 'store');
        $this->middleware(['can:admin.posts.edit'])->only('edit', 'update');
        $this->middleware(['can:admin.posts.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {
        $posts = Post::where('blogger_id', auth()->user()->blogger->id)->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $tags = Tag::all();

        $categorias = Categoria::pluck('name', 'id');

        $status = [
            1 => 'Borrador',
            2 => 'Publicado'
        ];

        return view('admin.posts.create', compact('tags', 'categorias', 'status'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:posts',
            /* 'descripcion' => 'required|string|max:255',
            'body' => 'required',
            'tags' => 'required',
            'picture' => 'required' */
        ]);
        
        $resultado = $request->all();

        if($request->file('picture')){
            $resultado['picture'] = Storage::put('posts', $request->file('picture'));
        }

        $post = Post::create($resultado);
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se creó con éxito');
    }

    public function show($id)
    {
        //
    }

   
    public function edit(Post $post)
    {

        $tags = Tag::all();

        $categorias = Categoria::pluck('name', 'id');

        $status = [
            1 => 'Borrador',
            2 => 'Publicado'
        ];

        return view('admin.posts.edit', compact('post', 'tags', 'categorias','status'));
    }


    public function update(Request $request, Post $post)
    {

        if($request->status == 1){

            $request->validate([
                'name' => 'required|string|max:255|unique:posts,name,'.$post->id,
            ]);

        }else{

            $request->validate([
                'name' => 'required|string|max:255|unique:posts,name,'.$post->id,
                'descripcion' => 'required|string|max:255',
                'body' => 'required',
                'tags' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);
            
            if(!$post->picture){
                $request->validate([
                    'picture' => 'required'
                ]);
            }
            
        }

        
        $resultado = $request->all();

        if($request->file('picture')){
            Storage::delete($post->picture);
            $resultado['picture'] = Storage::put('posts', $request->file('picture'));
        }

        $post->update($resultado);

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }


    public function destroy(Post $post)
    {
        Storage::delete($post->picture);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('eliminar', 'Post eliminado con éxito');
    }
}
