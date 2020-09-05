<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    
    public function __construct(){
        $this->middleware(['can:admin.tags.index'])->only('index');
        $this->middleware(['can:admin.tags.create'])->only('create', 'store');
        $this->middleware(['can:admin.tags.edit'])->only('edit', 'update');
        $this->middleware(['can:admin.tags.destroy'])->only('edit', 'destroy');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' => "required|unique:tags",
            'background' => 'required'
        ]);

        Tag::create($request->all());
        
        return redirect()->route('admin.tags.index')->with('info', 'etiqueta creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => "required|unique:tags,name,$tag->id",
            'background' => 'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'Etiqueta actualizada con éxito');

        //return back()->with('info', 'Etiqueta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('eliminar', 'La etiqueta se eliminó con éxito');
    }
}
