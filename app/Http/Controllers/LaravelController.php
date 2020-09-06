<?php

namespace App\Http\Controllers;

use App\Manual;
use App\Tema;
use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function index(){
        $manual = Manual::first();

        $actual = $manual->temas()->first();

        return view('manuales.laravel', compact('manual', 'actual'));
    }

    public function tema(Tema $tema){
        $manual = Manual::first();
        $actual = $tema;

        return view('manuales.laravel', compact('manual', 'actual'));
    }
}
