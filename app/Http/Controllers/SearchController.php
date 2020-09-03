<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class SearchController extends Controller
{


    public function home(Request $request){

        $term = $request->get('term');
        
        $querys = Curso::where('name', 'LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->name,
                'category'=> "Cursos",
            ];
        }

        return $data;
        
    }



    public function cursos(Request $request){
        $term = $request->get('term');
        
        $querys = Curso::where('name', 'LIKE', '%' . $term . '%')->select('name as label')->get();

        return $querys;
    }
}
