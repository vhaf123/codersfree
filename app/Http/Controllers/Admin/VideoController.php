<?php

namespace App\Http\Controllers\Admin;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Video;

class VideoController extends Controller
{
    
    public function __construct(){
        $this->middleware(['can:admin.cursos.edit']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'descripcion' => ['required'],
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
        ]);

        Video::create($request->all());

        return redirect()->route('admin.modulos.show', $request->modulo_id)->with('info', 'El video se agregó con éxito');
    }

    
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'url' => 'required'
        ]);

        $video->update($request->all());

        return redirect()->route('admin.modulos.show', $video->modulo->id)->with('info', 'El video se actualizó con éxito');
    }
  
    public function destroy(Video $video)
    {
        //
    }
   
}
