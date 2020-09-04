<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Manual;
use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
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
        $manual = Manual::first();

        return view('admin.temas.create', compact('manual'));
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
            'manual_id' => 'required',
            'name' => 'required|unique:temas',
            'body' => 'required',
            'description' => 'required'
        ]);

        $tema = Tema::create($request->all());
        
        return redirect()->route('admin.temas.edit', $tema)->with('info', 'El tema se creó con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        $manual = Manual::first();
        return view('admin.temas.edit', compact('tema', 'manual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        $request->validate([
            'manual_id' => 'required',
            'name' => "required|unique:temas,name,$tema->id",
            'body' => 'required',
            'description' => 'required'
        ]);

        $tema->update($request->all());
        return redirect()->route('admin.temas.edit', $tema)->with('info', 'El tema se actualizó con éxito');
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
