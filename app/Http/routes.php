<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//__________________________________________________________________________________________________________________

//Prueba con controlador

Route::get('controlador','prueba@index');
    
//__________________________________________________________________________________________________________________

// Prueba de rutas con parametros 04/10/2018

Route::get('nombre/{nombre}', function ($nombre) {
    return "mi nombre es:".$nombre;
});

//__________________________________________________________________________________________________________________

//Prueba de rutas con parametros fijos 04/10/2018

Route::get('edad/{edad?}', function ($edad = '20') {
    return $edad;
});

//__________________________________________________________________________________________________________________

Route::get('/', function () {
    return view('welcome');
});

