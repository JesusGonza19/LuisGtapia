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

//Prueba de rutas 04/10/2018

Route::get('nombre/{nombre}', function ($nombre) {
    return "mi nombre es:".$nombre;
});

// Prueba de rutas 04/10/2018


Route::get('/', function () {
    return view('welcome');
});

