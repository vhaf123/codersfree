<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\PageCurso;

class PageCursoController extends Controller
{

    public function __construct(){
        $this->middleware(['can:page.cursos']);
    }


    public function index(){
        $page_curso = PageCurso::first();
        return view('admin/pageCursos/index', compact('page_curso'));
    }

    public function update(Request $request, PageCurso $curso){
        
        $request->validate([
            'portada_title' => 'required',
            'portada_text' => 'required',
            'portada_search' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);

        

        $resultado = $request->all();

        if($request->file('portada_picture')){

            Storage::delete($curso->portada_picture);
            $resultado['portada_picture'] = Storage::put('cursos', $request->file('portada_picture'));
           
        }

        $curso->update($resultado);

        return redirect()->route('page.cursos.index')->with('info', 'La página cursos fue actualizado con éxito');
    }
}
