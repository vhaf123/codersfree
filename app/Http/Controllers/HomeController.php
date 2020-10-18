<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

use App\Home;
use App\Manual;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cursos = Curso::latest('id')
                ->where('status', '!=', 1)
                ->take(7)
                ->get();

        $cursos_publicados = Curso::where('status', '!=', 1)->count();
        $manuales_publicados = Manual::where('status', '!=', 1)->count();
        $posts_publicados = Post::where('status', '!=', 1)->count();

        $home = Home::first();
        return view('home', compact('home', 'cursos', 'cursos_publicados', 'manuales_publicados', 'posts_publicados'));
    }
}
