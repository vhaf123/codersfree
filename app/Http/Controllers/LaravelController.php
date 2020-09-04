<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Tema;
use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function index(){
        $laravel = Manual::first();

        $actual = $laravel->temas()->first();

        return view('manuales.laravel', compact('laravel', 'actual'));
    }

    public function tema(Tema $tema){
        $laravel = Manual::first();
        $actual = $tema;

        return view('manuales.laravel', compact('laravel', 'actual'));
    }
}
