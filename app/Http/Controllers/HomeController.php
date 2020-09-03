<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

use App\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $cursos = Curso::orderBy('users_count', 'desc')
                ->latest('id')
                ->where('status', '!=', 1)
                ->take(8)
                ->get();

        $cursos_publicados = Curso::where('status', '!=', 1)->count();

        $home = Home::first();
        return view('home', compact('home', 'cursos', 'cursos_publicados'));
    }
}
