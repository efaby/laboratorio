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
Route::get("orden/medicos",array('as'=>'medicos','uses'=> 'OrdenController@medicos'));
Route::get("orden/orden/{id}",array('as'=>'orden1','uses'=> 'OrdenController@orden'));
Route::post("orden/saveOrden",array('as'=>'saveOrden','uses'=> 'OrdenController@saveOrden'));
Route::get("orden/ordenPdf/{id}",array('as'=>'ordenPdf','uses'=> 'OrdenController@ordenPdf'));
Route::get("orden/imprimir/{id}",array('as'=>'imprimir','uses'=> 'OrdenController@imprimir'));
Route::get("orden/generarCodigo/{id}",array('as'=>'generarCodigo','uses'=> 'OrdenController@generarCodigo'));
Route::get("orden/updatePage",array('as'=>'updatePage','uses'=> 'OrdenController@updatePage'));


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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
