<?php

namespace App\Http\Controllers\Admin;

use App\Capitulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $request->validate([
            'name' => 'required',
            'manual_id' => 'required'
        ]);
        
        Capitulo::create($request->all());

        return back()->with('info', 'El capítulo se agregó con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Capitulo $capitulo)
    {

        return view('admin.capitulos.show', compact('capitulo'));
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
    public function update(Request $request, Capitulo $capitulo)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $capitulo->update($request->all());

        return back()->with('info', 'El capítulo se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capitulo $capitulo)
    {
        $capitulo->delete();

        return back()->with('eliminar', 'El capítulo se eliminó con éxito');
    }
}
