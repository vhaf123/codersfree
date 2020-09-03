<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Manual;
use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function index(){

        $manual = Manual::first();

        return view('admin.laravel.index', compact('manual'));
    }
}
