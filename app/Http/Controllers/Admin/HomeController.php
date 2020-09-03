<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Str;

class HomeController extends Controller
{
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

            if($home->portada_picture){
                Storage::delete($home->portada_picture);
            }

            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('portada_picture'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['portada_picture'] = 'home/' . $nombre;
        }

        if($request->file('contenido_picture_1')){
            if($home->contenido_picture_1){
                Storage::delete($home->contenido_picture_1);
            }

            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('contenido_picture_1'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['contenido_picture_1'] = 'home/' . $nombre;
        }

        if($request->file('contenido_picture_2')){
            if($home->contenido_picture_2){
                Storage::delete($home->contenido_picture_2);
            }
            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('contenido_picture_2'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['contenido_picture_2'] = 'home/' . $nombre;
        }

        if($request->file('contenido_picture_3')){
            if($home->contenido_picture_3){
                Storage::delete($home->contenido_picture_3);
            }
            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('contenido_picture_3'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['contenido_picture_3'] = 'home/' . $nombre;
        }

        if($request->file('contenido_picture_4')){
            if($home->contenido_picture_4){
                Storage::delete($home->contenido_picture_4);
            }
            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('contenido_picture_4'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['contenido_picture_4'] = 'home/' . $nombre;
        }

        if($request->file('nuevo_contenido_picture')){
            if($home->nuevo_contenido_picture){
                Storage::delete($home->nuevo_contenido_picture);
            }
            
            $nombre = Str::random(30) . '.png';
            $path = storage_path() . "\app\public\home/" . $nombre;

            Image::make($request->file('nuevo_contenido_picture'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('png')
                ->save($path);

            $resultado['nuevo_contenido_picture'] = 'home/' . $nombre;
        }
        
        $home->update($resultado);

        return redirect()->route('admin.home.index')->with('info', 'La página home fue actualizado con éxito');
    }

}
