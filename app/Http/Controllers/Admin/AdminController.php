<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.index']);
    }

    public function index(){
        return view('admin.index');
    }
}
