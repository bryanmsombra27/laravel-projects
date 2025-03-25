<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    //
    public function index(){
            // PASANDO VALORES A LA VISTA
    // return view('jobs.index',[
    //     'title'=> "Available jobs"
    // ]);
    $title = "All jobs";
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
            "salary" => "required|integer",
            "tags" => "nullable|string",
            "job_type" => "required|string",
            "remote" => "required|boolean",
            "requirements" => "nullable|string",
            "benefits" => "nullable|string",
            "address" => "nullable|string",
            "city" => "required|string",
            "state" => "required|string",
            "zipcode" => "nullable|string",
            "contact_email" => "required|string",
            "contact_phone" => "nullable|string",
            "company_name" => "required|string",
            "company_description" => "nullable|string",
            "company_logo" => "nullable|image|mimes:jpeg,jpg,png,gif|max:2048",
            "company_website" => "nullable|url",
        ]);
        // harcode user id
        $validatedData["user_id"] = 1;

            // Job::create([
            //     'title'=> $validatedData["title"],
            //     "description"=> $validatedData["description"]
            // ]);
        
            //check for image
            if($request -> hasFile("company_logo")){
                // store file and get path
                $path = $request -> file("company_logo")-> store("logos","public");

                    // add path to validated Data object
                    $validatedData["company_logo"] = $path;
            } 


            // submit to db
            Job::create($validatedData);

            return redirect() -> route("jobs.index")-> with("sucess","Job listing created successfully!");
    }

    public function edit(Job $job){

        return view("jobs.edit") -> with("job",$job);
    }

    public function update(Request $request, Job $job){
            // AGREGANDO VALIDACIONES
        $validatedData = $request-> validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "salary" => "required|integer",
            "tags" => "nullable|string",
            "job_type" => "required|string",
            "remote" => "required|boolean",
            "requirements" => "nullable|string",
            "benefits" => "nullable|string",
            "address" => "nullable|string",
            "city" => "required|string",
            "state" => "required|string",
            "zipcode" => "nullable|string",
            "contact_email" => "required|string",
            "contact_phone" => "nullable|string",
            "company_name" => "required|string",
            "company_description" => "nullable|string",
            "company_logo" => "nullable|image|mimes:jpeg,jpg,png,gif|max:2048",
            "company_website" => "nullable|url",
        ]);  
            //check for image
            if($request -> hasFile("company_logo")){

                // Delete old logo
                Storage::delete("public/logos/". basename($job->company_logo));

                // store file and get path
                $path = $request -> file("company_logo")-> store("logos","public");

                    // add path to validated Data object
                    $validatedData["company_logo"] = $path;
            } 


            // submit to db
             $job -> update($validatedData);

            return redirect() -> route("jobs.index")-> with("sucess","Job listing updated successfully!");


    }

    public function destroy( Job $job){
        // $job->destroy();
        if($job->company_logo){
            Storage::delete("public/logos/" . $job->company_logo);
        }

        $job ->delete();

        return redirect() -> route("jobs.index")-> with("sucess","Job listing deleted successfully!");
    }

}
