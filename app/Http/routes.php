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

/*
*/




/* Estos son parametros que siempre se configuran para la autentificacion del Login 
*/

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

/*
*/


/* Redireccionamiento o enrutamiento de la plantilla boostrap admin 4 (creado las rutas)

Route::get('home', function () {
    return view('home');
});

Route::get('login', function () {
    return view('login');
});

//Esto se comento para el siguiente procedimiento en la configuracion del Login

/*


/* Prueba Declarar controlador RESTfull
*/

Route::resource('escuela' ,'EscuelaController');

/*
*/

/*Prueba con controlador
*/

Route::get('controlador','prueba@index');
    
/*
*/

/* Prueba de rutas con parametros 04/10/2018
*/

Route::get('nombre/{nombre}', function ($nombre) {
    return "mi nombre es:".$nombre;
});

/*
*/

/*Prueba de rutas con parametros fijos 04/10/2018
*/
Route::get('edad/{edad?}', function ($edad = '20') {
    return $edad;
});

/*
*/

Route::get('/', function () {
    return view('welcome');
});

