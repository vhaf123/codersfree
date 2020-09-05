<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.home']);
    }

    public function index()
    {
        $home = Home::first();
        return view('admin.home.index',compact('home'));
    }


    public function update(Request $request, Home $home)
    {


        $request->validate([
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
            'portada_title' => 'required|max:255',
            'portada_text' => 'required|max:255',
            'portada_search' => 'required|max:255',
            'contenido_icon_1' => 'required|max:255',
            'contenido_title_1' => 'required|max:255',
            'contenido_subtitle_1' => 'required|max:255',
            'contenido_text_1' => 'required|max:255',
            'contenido_icon_2' => 'required|max:255',
            'contenido_title_2' => 'required|max:255',
            'contenido_subtitle_2' => 'required|max:255',
            'contenido_text_2' => 'required|max:255',
            'contenido_icon_3' => 'required|max:255',
            'contenido_title_3' => 'required|max:255',
            'contenido_subtitle_3' => 'required|max:255',
            'contenido_text_3' => 'required|max:255',
            'contenido_icon_4' => 'required|max:255',
            'contenido_title_4' => 'required|max:255',
            'contenido_subtitle_4' => 'required|max:255',
            'contenido_text_4' => 'required|max:255',
            'ventaja_icon_1' => 'required|max:255',
            'ventaja_title_1' => 'required|max:255',
            'ventaja_text_1' => 'required|max:255',
            'ventaja_icon_2' => 'required|max:255',
            'ventaja_title_2' => 'required|max:255',
            'ventaja_text_2' => 'required|max:255',
            'ventaja_icon_3' => 'required|max:255',
            'ventaja_title_3' => 'required|max:255',
            'ventaja_text_3' => 'required|max:255',
            'nuevo_contenido_title' => 'required|max:255',
            'nuevo_contenido_subtitle' => 'required|max:255',
            'informacion_title' => 'required|max:255',
            'informacion_text' => 'required',
        ]);
        
        $resultado = $request->all();

        if($request->file('portada_picture')){
            
            Storage::delete($home->portada_picture);
            $resultado['portada_picture'] = Storage::put('home', $request->file('portada_picture'));
            
        }

        if($request->file('contenido_picture_1')){
            
            Storage::delete($home->contenido_picture_1);
            $resultado['contenido_picture_1'] = Storage::put('home', file('contenido_picture_1'));
        }

        if($request->file('contenido_picture_2')){
            
            Storage::delete($home->contenido_picture_2);
            $resultado['contenido_picture_2'] = Storage::put('home', $request->file('contenido_picture_2'));

        }

        if($request->file('contenido_picture_3')){

            Storage::delete($home->contenido_picture_3);
            $resultado['contenido_picture_3'] = Storage::put('home', $request->file('contenido_picture_3'));
            
        }

        if($request->file('contenido_picture_4')){
            
            Storage::delete($home->contenido_picture_4);
            $resultado['contenido_picture_4'] = Storage::put('home', $request->file('contenido_picture_4'));
            
        }

        if($request->file('nuevo_contenido_picture')){

            Storage::delete($home->nuevo_contenido_picture);
            $resultado['nuevo_contenido_picture'] = Storage::put('home', $request->file('nuevo_contenido_picture'));

        }

        if($request->file('informacion_picture')){

            Storage::delete($home->informacion_picture);
            $resultado['informacion_picture'] = Storage::put('home', $request->file('informacion_picture'));
        }
        
        $home->update($resultado);

        return redirect()->route('admin.home.index')->with('info', 'La página home fue actualizado con éxito');
    }

}
