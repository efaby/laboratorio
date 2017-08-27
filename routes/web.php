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

Route::get("orden/autocomplete",array('as'=>'autocomplete','uses'=> 'OrdenController@autocomplete'));
Route::get("orden/examenes",array('as'=>'examenes','uses'=> 'OrdenController@examenes'));

Route::group(['middleware' => ['web']], function () {
	Route::resource('tipousuario', 'TipoUsuarioController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('tipoexamen', 'TipoExamenController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('tipopaciente', 'TipoPacienteController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('muestra', 'MuestraController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('muestra', 'MuestraController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('examen', 'ExamenController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('paciente', 'PacienteController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('orden', 'OrdenController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('cliente', 'ClienteController');
});