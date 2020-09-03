<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Requisito;

class RequisitoController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.cursos.edit']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Requisito::create($request->all());
    }

    public function update(Request $request, Requisito $requisito)
    {
        $requisito->update($request->all());
    }

    public function destroy(Requisito $requisito)
    {
        $requisito->delete();
    }
}
