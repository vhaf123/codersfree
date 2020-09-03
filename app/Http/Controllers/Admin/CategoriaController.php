<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware(['can:admin.categorias.index'])->only('index');
        $this->middleware(['can:admin.categorias.create'])->only('create', 'store');
        $this->middleware(['can:admin.categorias.edit'])->only('edit', 'update');
        $this->middleware(['can:admin.categorias.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {

        $categorias = Categoria::all();

        return view('admin.categorias.index', compact('categorias'));
    }

   
    public function create()
    {
        return view('admin.categorias.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categorias',
            'badge' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('admin.categorias.index')->with('info', 'La categoría se creó con éxito');
    }

    public function show(Categoria $categoria)
    {
        //
    }

    
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'name' => "required|unique:categorias,name,$categoria->id",
            'badge' => 'required',
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with('info', 'La categoría se actualizó con éxito');

    }
   
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('eliminar', 'La categoría se eliminó con éxito');
    }
}
