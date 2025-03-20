<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/jobs",function(){
    return view('jobs');
}) -> name("jobs");



// RUTAS DE PRUEBAS  PARA SABER COMO SE ENCUENTRA EL ENTORNO DE LARAVEL

// CREAR UNA API EN LARAVEL
Route::get("/api/user",function(){
    return [
     'name' => 'koso',
     'email'=> 'koso@koso.com'
    ];
});

Route::get("/posts/{id}",function(string $id){
    return "posts $id";
})-> where("id","[0-9]+"); //VALIDACION REGEX PARA QUE SOLO ACEPTE NUMEROS EN EL PARAMETRO ID

Route::put("/posts/{id}",function(string $id){
    return "posts $id";
})-> whereNumber("id"); // TAMBIEN ES POSIBLE USAR VALIDACIONES POR DEFECTO QUE OFRECE LARAVEL 

Route::get('/request', function (Request $request) {
return [
    "method" => $request->method(),
    "url" => $request->url(),
    "path" => $request->path(),
    "fullUrl" => $request->fullUrl(),
    "ip" => $request->ip(),
    "userAgent" => $request->userAgent(),
    "header" => $request->header()
];
    
});

Route::get('/users', function (Request $request) {
        // obtener valor por query params
    // return $request-> query("name");

    // solo obtiene valores que se especifiquen en el arreglo, cualquier otro es ignorado
    // return $request-> only(["name","age"]);

    // OBTENER TODOS LOS QUERY PARAMS
    // return $request-> all();

//  DEVUELVE UN TRUE/FALSE SI UN QUERY PARAM EXISTE O NO EN LA URL
    return $request-> has("name"); 
});

Route:: get('/response',function(){
    // return new Response("Page not found",404);

    // HELPER PARA DAR RESPUESTAS 
    // return response("Page not found",404);

    return response("<h1>koso</h1>",200)-> header("Content-Type","text/plain") ;

});    