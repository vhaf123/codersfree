<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Curso;
use App\Nivel;
use App\PageCurso;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only('matricular');
    }


    public function index(Request $request)
    {

        $search = $request->get('search');
        $categoria_id = $request->get('categoria_id');
        $nivel_id = $request->get('nivel_id');
        $status = $request->get('status');

        $page_curso = PageCurso::first();

        $cursos = Curso::latest('users_count')
                    ->latest('id')
                    ->where('status', '!=', 1)
                    ->search($search)
                    ->categoria($categoria_id)
                    ->nivel($nivel_id)
                    ->status($status)
                    ->paginate(6);
                            
        $categorias = Categoria::all();

        $niveles = Nivel::all();

        return view('cursos.index', compact('page_curso', 'cursos', 'categorias', 'niveles'));
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
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {

        $similares = $curso->categoria
                            ->cursos()
                            ->where('id', '!=', $curso->id)
                            ->where('status', '!=', 1)
                            ->latest('id')
                            ->take(5)
                            ->get();

        return view('cursos.show', compact('curso', 'similares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }

    public function matricular(Curso $curso){
        $curso->users()->attach(auth()->user()->id);
        return redirect()->route('course-status.index', $curso);
    }

    public function review(Request $request, Curso $curso){


        $request->validate([
            'comentario' => 'required'
        ]);

        Review::create([
            'curso_id' => $curso->id,
            'user_id' => auth()->user()->id,
            'rating' => $request->get('rating'),
            'comentario' => $request->get('comentario')
        ]);
        
        return back();
    }
}
