<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
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
    $jobs = Job::all();
    
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

    // CUANDO EL PARAMETRO COINCIDE CON UN IN DE LA BASE DE DATOS SE PUEDE TIPAR EL PARAMETRO CON EL VALOR ESPERADO Y DE ESA FORMA SE EVITAR HACER LA COMPROBACION
    public function show(Job $job){
        

        
        return view("jobs.show")-> with("job",$job);

    }
    public function store(Request $request):RedirectResponse{
        // $title = $request-> input("title");
        // $description = $request-> input("description");

        // AGREGANDO VALIDACIONES
        $validatedData = $request-> validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
        ]);

            Job::create([
                'title'=> $validatedData["title"],
                "description"=> $validatedData["description"]
            ]);

            return redirect() -> route("jobs.index");
    }

}
