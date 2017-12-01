<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return redirect('/login');
});
Route::group(['middleware' => 'auth'], function(){
	Route::resource('/user', 'UserController');
	Route::get('/pnew', 'UserController@getForm');
	Route::post('/newp', 'UserController@password');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/tutor', 'TutorController');
	Route::resource('/estudiante', 'EstudianteController');
	Route::resource('/docente', 'DocenteController');
	Route::resource('/curso', 'CursoController');
	Route::resource('/materia', 'MateriaController');
	Route::resource('/inscripcion', 'InscripcionController');
	Route::resource('/calificacion', 'CalificacionController');
	Route::resource('/cursoMateria', 'CursomateriaController');
});
