<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{

    public function __construct(){
        $this->middleware(['can:admin.cursos.edit']);
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        Meta::create($request->all());

    }

    
    public function update(Request $request, Meta $meta)
    {
        
        $request->validate([
            'name' => 'required'
        ]);
        
        $meta->update($request->all());
    }

    
    public function destroy(Meta $meta)
    {
        $meta->delete();
    }
}
