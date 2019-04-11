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

/*---------- RUTAS DE LOGIN ----------------*/
Route::get('/', function () {
  return view('login');
})->name('login');

Route::post('auth', 'LoginController@login')->name('auth');
Route::post('/logout', 'LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function() { //middleware auth
  /* ---- Ruta para llamar al dashboard , modificarla si es necesario ----- */
	Route::get('dashboard', 'LoginController@index')->name('dashboard');

  // rutas resources
	Route::resources([
	    'users' 	    => 'UserController',
	    'comunas'     => 'ComunaController',
	    'cc'          => 'ConsejoComunalController',
	    'voceros'     => 'VoceroController',
	    'planillas'   => 'PlanillasController',
	]);
  
  // voceros
  Route::get('cc/buscar/{id}', 'ConsejoComunalController@buscarCC');
  
  // pdfs
  Route::get('pdfComuna', 'ComunaController@pdfComuna')->name("pdfComuna");
  Route::get('pdfCC', 'ConsejoComunalController@pdfCC')->name("pdfCC");
  Route::get('pdfVocero', 'VoceroController@pdfVocero')->name("pdfVocero");
  
	//* --- Perfil --- */
	Route::get('/perfil', 'UserController@perfil')->name('perfil');
	Route::patch('/perfil', 'UserController@update_perfil')->name('update_perfil');

});