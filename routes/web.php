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
Route::get("orden/autocompletgrupo",array('as'=>'autocompletgrupo','uses'=> 'OrdenController@autocompletgrupo'));
Route::get("orden/examenes",array('as'=>'examenes','uses'=> 'OrdenController@examenes'));
Route::get("orden/examenesEdit",array('as'=>'examenesEdit','uses'=> 'OrdenController@examenesEdit'));
Route::get("orden/medicos",array('as'=>'medicos','uses'=> 'OrdenController@medicos'));
Route::get("orden/orden/{id}",array('as'=>'orden1','uses'=> 'OrdenController@orden'));
Route::get("orden/validar/{id}",array('as'=>'validar','uses'=> 'OrdenController@validar'));
Route::post("orden/saveOrden",array('as'=>'saveOrden','uses'=> 'OrdenController@saveOrden'));
Route::post("orden/examenesDetalles",array('as'=>'examenesDetalles','uses'=> 'OrdenController@examenesDetalles'));
Route::get("orden/ordenPdf/{id}",array('as'=>'ordenPdf','uses'=> 'OrdenController@ordenPdf'));
Route::get("orden/imprimir/{id}",array('as'=>'imprimir','uses'=> 'OrdenController@imprimir'));
Route::get("orden/entidades",array('as'=>'entidades','uses'=> 'OrdenController@entidades'));
Route::get("orden/imprimirListado/{id}",array('as'=>'imprimir','uses'=> 'OrdenController@imprimirListado'));

Route::get("orden/generarCodigo/{id}",array('as'=>'generarCodigo','uses'=> 'OrdenController@generarCodigo'));
Route::get("orden/updatePage",array('as'=>'updatePage','uses'=> 'OrdenController@updatePage'));

Route::get("facturacion/individual",array('as'=>'individual','uses'=> 'FacturacionController@individual'));
Route::get("facturacion/editIndividual/{id}",array('as'=>'editIndividual','uses'=> 'FacturacionController@editIndividual'));
Route::post("facturacion/guardarIndividual",array('as'=>'guardarFacturaIndividual','uses'=> 'FacturacionController@guardarFacturaIndividual'));
Route::get("facturacion/verIndividual/{id}",array('as'=>'verIndividual','uses'=> 'FacturacionController@verIndividual'));
Route::get("facturacion/imprimirIndividual/{id}",array('as'=>'imprimirIndividual','uses'=> 'FacturacionController@imprimirIndividual'));
Route::get("facturacion/obtenerCliente",array('as'=>'obtenerCliente','uses'=> 'FacturacionController@obtenerCliente'));
Route::get("facturacion/anexoIndividual/{id}",array('as'=>'anexoIndividual','uses'=> 'FacturacionController@anexoIndividual'));


Route::post("verExamen",array('as'=>'verExamenForm','uses'=> 'PublicoController@buscarExamen'));
Route::post("validarCedula",array('as'=>'validarCedula','uses'=> 'PacienteController@validarCedula'));
Route::get("verExamen",array('as'=>'verExamen','uses'=> 'PublicoController@index'));
Route::get("examenPdf/{id}",array('as'=>'examenPdf','uses'=> 'PublicoController@ordenPdf'));

Route::get("facturacion/listadoGlobal",array('as'=>'listadoGlobal','uses'=> 'FacturacionController@listadoGlobal'));
Route::get("facturacion/global",array('as'=>'global','uses'=> 'FacturacionController@global'));
Route::post("facturacion/global",array('as'=>'globalForm','uses'=> 'FacturacionController@facturarGlobal'));
Route::post("facturacion/guardarGlobal",array('as'=>'guardarFacturaGlobal','uses'=> 'FacturacionController@guardarFacturaGlobal'));
Route::get("facturacion/imprimirGlobal/{id}",array('as'=>'imprimirGlobal','uses'=> 'FacturacionController@imprimirGlobal'));
Route::get("facturacion/anexoGlobal/{id}",array('as'=>'anexoGlobal','uses'=> 'FacturacionController@anexoGlobal'));



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

Route::group(['middleware' => ['web']], function () {
	Route::resource('user', 'UserController');
});

Route::post("validarCedulaUser",array('as'=>'validarCedulaUser','uses'=> 'UserController@validarCedulaUser'));
