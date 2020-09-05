<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('contactanos.index');
    }

    public function mensaje(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'mensaje' => 'required',
        ]);

        Mail::send('contactanos.mensaje', $request->all(), function ($message) {
            
            $message->to('victor.aranaf92@gmail.com', 'Victor Arana');
            $message->subject('Información de contácto');
            
        });

        return redirect()->route('contactanos.index')->with('info', 'Tu mensaje se envío con éxito');
    }
}
