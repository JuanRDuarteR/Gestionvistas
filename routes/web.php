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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Crear las rutas con el respectivo controlador

Route::resource('/actividades', 'ActividadController');

Route::resource('/bajas', 'BajaController');

Route::resource('/vacas', 'VacaController');

Route::resource('/partos', 'PartoController');

Route::resource('/enfermedades', 'EnfermedadController');