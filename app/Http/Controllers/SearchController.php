<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Post;

class SearchController extends Controller
{


    public function home(Request $request){

        $term = $request->get('term');

        $querys_curso = Curso::where('name', 'LIKE', '%' . $term . '%')
                        ->where('status', '!=', 1)
                        ->orderBy('name','ASC')
                        ->take(10)
                        ->select('name', 'slug')->get();

        $querys_post = Post::where('name', 'LIKE', '%' . $term . '%')
                    ->where('status', 2)
                    ->orderBy('name','ASC')
                    ->take(10)
                    ->select('name', 'slug')->get();

        $data = [];

        foreach ($querys_curso as $query) {
            $data[] = [
                'label' => $query->name,
                'category'=> "Cursos",
                'slug' => $query->slug
            ];
        }

        foreach ($querys_post as $query) {
            $data[] = [
                'label' => $query->name,
                'category'=> "Posts",
                'slug' => $query->slug
            ];
        }

        return $data;
        
    }



    public function cursos(Request $request){
        $term = $request->get('term');
        
        $querys = Curso::where('name', 'LIKE', '%' . $term . '%')
                        ->where('status', '!=', 1)
                        ->orderBy('name','ASC')
                        ->take(10)
                        ->select('name as label', 'slug')->get();

        return $querys;
    }

    public function posts(Request $request){
        $term = $request->get('term');
        
        $querys = Post::where('name', 'LIKE', '%' . $term . '%')
                    ->where('status', 2)
                    ->orderBy('name','ASC')
                    ->take(10)
                    ->select('name as label', 'slug')->get();

        return $querys;
    }
}
