<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Curso;
use App\Nivel;

class CursoController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.cursos.index'])->only('index');
        $this->middleware(['can:admin.cursos.create'])->only('create', 'store');
        $this->middleware(['can:admin.cursos.edit'])->only('edit', 'update', 'metas', 'requisitos', 'modulos');
        $this->middleware(['can:admin.cursos.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {

        $cursos = Curso::where('profesor_id', auth()->user()->profesor->id)->latest()->get();

        return view('admin.cursos.index', compact('cursos'));
    }
    
    public function create()
    {

        $categorias = Categoria::pluck('name', 'id');
        $niveles = Nivel::pluck('name', 'id');

        return view('admin.cursos.create', compact('categorias', 'niveles'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cursos',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'nivel_id' => 'required',
            'picture' => 'required'
        ]);

        $resultado = $request->all();

        $nombre = Str::random(30) . '.png';
        $path = storage_path() . "\app\public\cursos/" . $nombre;

        Image::make($request->file('picture'))
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

        $resultado['picture'] = 'cursos/' . $nombre;

        $curso = Curso::create($resultado);
        
        return redirect()->route('admin.cursos.edit', $curso)->with('info', 'El curso se creó con éxito');
    }
    
    public function edit(Curso $curso)
    {
        $this->authorize('dictado', $curso);
        $categorias = Categoria::pluck('name', 'id');
        $niveles = Nivel::pluck('name', 'id');

        $status = ["1" => 'Borrador', "2" => 'Elaboración', "3" => 'Culminado'];

        return view('admin.cursos.edit', compact('curso', 'categorias', 'niveles', 'status'));
    }
   
    public function update(Request $request, Curso $curso)
    {
        $this->authorize('dictado', $curso);

        $request->validate([
            'name' => "required|unique:cursos,name,$curso->id",
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'nivel_id' => 'required',
        ]);



        $resultado = $request->all();

        if($request->file('picture')){

            Storage::delete($curso->picture);

            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\cursos/" . $nombre;

            Image::make($request->file('picture'))
                ->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

                $resultado['picture'] = 'cursos/' . $nombre;
        }

        $curso->update($resultado);

        return redirect()->route('admin.cursos.edit', $curso)->with('info', 'El curso se actualizó con éxito');
    }

   
    public function destroy(Curso $curso)
    {
        $this->authorize('dictado', $curso);
        
        Storage::delete($curso->picture);
        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('eliminar', 'Curso eliminado con éxito');
    }

    public function metas(Curso $curso){
        $this->authorize('dictado', $curso);
        return view('admin.cursos.metas', compact('curso'));
    }

    public function requisitos(Curso $curso){
        $this->authorize('dictado', $curso);
        return view('admin.cursos.requisitos', compact('curso'));
    }

    public function modulos(Curso $curso){
        $this->authorize('dictado', $curso);
        return view('admin.cursos.modulos', compact('curso'));
    }

}
