<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// FORMA NORMAL DE TRABAJAR CON  RUTAS Y EL CONTROLADOR EN EL MISMO ARCHIVO
// Route::get("/jobs",function(){
//     // PASANDO VALORES A LA VISTA
//     // return view('jobs.index',[
//     //     'title'=> "Available jobs"
//     // ]);
//     $title = "Available jobs";
//     $jobs = ["Web Developer","Software Engineer","DB Admin","Systems Analyst"];
//     // $jobs = [];
    
//     // CUANDO SE UTILIZA EL HELPER compact EL PARAMETRO DE TIPO STRING DEBE COINCIDIR CON EL NOMBRE DE LA VARIABLE QUE SE DESEA  PASAR A LA VISTA
//     return view('jobs.index',compact("title","jobs"));

// }) -> name("jobs");

// Route::get("/jobs/create",function(){
    // $title = "Available jobs";
    // $jobs = ["Web Developer","Software Engineer","DB Admin","Systems Analyst"];
    
    // // CUANDO SE UTILIZA EL HELPER compact EL PARAMETRO DE TIPO STRING DEBE COINCIDIR CON EL NOMBRE DE LA VARIABLE QUE SE DESEA  PASAR A LA VISTA
    // return view('jobs.create',compact("title"));
    // // return view('jobs.create') ->with("title","OTRA FORMA DE PASAR VARIABLES A LA VISTA");
// }) -> name("jobs.create");

/////////////////////////////////////////////////////////


// SEPARANDO LA FUNCIONALIDAD  HACIA EL CONTROLADOR
Route::get("/",[HomeController::class,"index"]) -> name("home.index");
Route::get("/jobs",[JobController::class,"index"]) -> name("jobs");
Route::get("/jobs/create",[JobController::class,"create"]) -> name("jobs.create");
Route::post("/jobs",[JobController::class,"store"]) -> name("jobs.store");
// COLOCAR LOS PARAMETROS AL FINAL
Route::get("/jobs/{id}",[JobController::class,"show"]) -> name("jobs.show");



