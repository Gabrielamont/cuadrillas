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

Route::group(['middleware' => 'auth'], function () {
    //middleware auth
    /* ---- Ruta para llamar al dashboard , modificarla si es necesario ----- */
    Route::get('dashboard', 'LoginController@index')->name('dashboard');

    // rutas resources
    Route::resources([
        'users'     => 'UserController',
        'comunas'   => 'ComunaController',
        'cc'        => 'ConsejoComunalController',
        'voceros'   => 'VoceroController',
        'planillas' => 'PlanillasController',
        'sectores'  => 'SectoresController',
    ]);

    //select dinamicos de planilla
    Route::get('/comuna/{id}', 'PlanillasController@comunas')->name('comuna.dinamico');
    Route::get('/consejo/{id}', 'PlanillasController@consejo')->name('consejo.dinamico');
    Route::get('/sector/{id}', 'PlanillasController@sector')->name('sector.dinamico');

    // consejos comunales
    Route::get('cc/buscar/{id}', 'ConsejoComunalController@buscarCC');
    Route::get('ccPdf/{id}', 'ConsejoComunalController@ccPdfID')->name("cc.pdf");

    //sectores
    Route::get('sectorPdf/{id}', 'SectoresController@sectorPdfID')->name("sector.pdf");

    //voceros
    Route::post('voceroPdf', 'VoceroController@voceroPdf')->name("voceroPdf");

    // pdfs
    Route::get('pdfComuna', 'ComunaController@pdfComuna')->name("pdfComuna");
    Route::get('pdfCC', 'ConsejoComunalController@pdfCC')->name("pdfCC");
    Route::get('pdfVocero', 'VoceroController@pdfVocero')->name("pdfVocero");
    Route::get('plan/{id}', 'PlanillasController@pdf')->name('planillas.pdf');

    /* -- PDf comunas -- */
    Route::get('pdfCo/{id}','ComunaController@pdf')->name('comuna.pdf');

    //* --- Perfil --- */
    Route::get('/perfil', 'UserController@perfil')->name('perfil');
    Route::patch('/perfil', 'UserController@update_perfil')->name('update_perfil');

});
