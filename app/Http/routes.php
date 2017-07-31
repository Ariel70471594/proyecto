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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/clinica/','controllerClinica@inicio');//vista
Route::get('/clinica/servicio','controllerClinica@servicio');//vista
Route::get('/clinica/ficha','controllerClinica@ficha');//vista
Route::get('/clinica/post','controllerClinica@post');
Route::get('/clinica/getespecialidad','controllerClinica@getespecialidad');/*cargar lista de especialidad*/
Route::get('/clinica/listarmedico','controllerClinica@listarmedico');
Route::get('/clinica/crearEspecialidad','controllerClinica@crearEspecialidad');
Route::post('/clinica/apicrearmedico','controllerClinica@apicrearmedico');
Route::post('/clinica/apicrearespecialidad','controllerClinica@apicrearespecialidad');
Route::post('/clinica/apicrearservicio','controllerClinica@apicrearservicio');
Route::post('/clinica/apicrearficha','controllerClinica@apicrearficha');
Route::get('/clinica/servicio','controllerClinica@servicio');

Route::get('/clinica/listarservicio','controllerClinica@listarservicio');
Route::get('/clinica/listarturno','controllerClinica@listarturno');