<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index(){
            // PASANDO VALORES A LA VISTA
    // return view('jobs.index',[
    //     'title'=> "Available jobs"
    // ]);
    $title = "Available jobs";
    $jobs = ["Web Developer","Software Engineer","DB Admin","Systems Analyst"];
    // $jobs = [];
    
    // CUANDO SE UTILIZA EL HELPER compact EL PARAMETRO DE TIPO STRING DEBE COINCIDIR CON EL NOMBRE DE LA VARIABLE QUE SE DESEA  PASAR A LA VISTA
    return view('jobs.index',compact("title","jobs"));
    }

    public function create(){
            $title = "Available jobs";

//     $jobs = ["Web Developer","Software Engineer","DB Admin","Systems Analyst"];
//     // return view('jobs.create') ->with("title","OTRA FORMA DE PASAR VARIABLES A LA VISTA");
    
//     // CUANDO SE UTILIZA EL HELPER compact EL PARAMETRO DE TIPO STRING DEBE COINCIDIR CON EL NOMBRE DE LA VARIABLE QUE SE DESEA  PASAR A LA VISTA
    return view('jobs.create',compact("title"));
    }

    public function show(string $id){
        return "showing Job $id";

    }
    public function store(Request $request){
        $title = $request-> input("title");
        $description = $request-> input("description");

        return "Title $title, Description: $description";

    }

}
