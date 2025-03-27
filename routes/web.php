<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
// Route::get("/",[HomeController::class,"index"]) -> name("home.index")->middleware("auth");
// Route::get("/jobs",[JobController::class,"index"]) -> name("jobs.index");
// Route::get("/jobs/create",[JobController::class,"create"]) -> name("jobs.create");
// Route::post("/jobs",[JobController::class,"store"]) -> name("jobs.store");

// // COLOCAR LOS PARAMETROS AL FINAL
// Route::get("/jobs/{job}",[JobController::class,"show"]) -> name("jobs.show");

// Route::get("/jobs/{job}/edit",[JobController::class,"edit"]) -> name("jobs.edit");

// Route::put("/jobs/{job} ",[JobController::class,"update"]) -> name("jobs.update");
// Route::delete("/jobs/{job} ",[JobController::class,"destroy"]) -> name("jobs.destroy");


Route::get("/",[HomeController::class,"index"])-> name("home");
Route::resource("jobs",JobController::class)->middleware("auth")->only(["create","edit","update","destroy"]);

Route::resource("jobs",JobController::class)->except(["create","edit","update","destroy"]);


// AGRUPANDO RUTAS PARA QUE APLIQUEN UN MISMO MIDDLEWARE EN ESTE CASO EL MIDDLEWARE DE GUEST PARA QUE UN USUARIO UNA VES LOGUEADO NO PUEDA ACCEDER A LAS RUTAS DE LOGIN Y REGISTER A MENOS QUE SE HAYA TERMINADO SU SESION.
Route::middleware("guest")->group(function(){
    Route::get("/register",[RegisterController::class,"register"]) ->name("register");
Route::post("/register",[RegisterController::class,"store"]) ->name("register.store");

Route::get("/login",[LoginController::class,"login"]) ->name("login");
Route::post("/login",[LoginController::class,"authenticate"]) ->name("login.authenticate");
});




Route::post("/logout",[LoginController::class,"logout"])->name("logout");