<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Manual;
use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    
    public function __construct(){
        $this->middleware(['can:admin.temas.create'])->only('create', 'store');
        $this->middleware(['can:admin.temas.edit'])->only('edit', 'update');
        $this->middleware(['can:admin.temas.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {
        //
    }

    
    public function create()
    {
        $manual = Manual::first();

        return view('admin.temas.create', compact('manual'));
    }

    
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        Tema::create($request->all());

        return back()->with('info', 'El tema se creó con éxito');
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit(Tema $tema)
    {
        $status = [
            '1' => 'Borrador',
            '2' => 'Publicado'
        ];

        $manual = Manual::first();
        return view('admin.temas.edit', compact('tema', 'manual', 'status'));
    }

   
    public function update(Request $request, Tema $tema)
    {

        if($request->status == 2){
            $request->validate([
                'name' => "required|unique:temas,name,$tema->id",
                'body' => 'required',
                'title' => 'required',
                'description' => 'required'
            ]);
        }

        $tema->update($request->all());
        
        return redirect()->route('admin.temas.edit', $tema)->with('info', 'El tema se actualizó con éxito');
    }

  
    public function destroy(Tema $tema)
    {
        $tema->delete();

        return redirect()->route('admin.laravel')->with('eliminar', 'Tema eliminado con éxito');
    }
}
