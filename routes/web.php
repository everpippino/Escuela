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


Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/persona/home', 'HomeController@index')->name('home');
    Route::get('persona', function(){
        return view('/persona/index');
    });
    Route::get('/persona/dni', 'PersonaController@dni');
    Route::get('/persona/deuda/{id}', 'PersonaController@deuda');
    Route::post('/persona/pagar', 'PersonaController@pagar');
    Route::post('/persona/guardar', 'PersonaController@guardar');
});



