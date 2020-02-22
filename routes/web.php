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

Route::get('/admin/persona/home', 'HomeController@index')->name('home');
Route::get('persona', function(){
    return view('admin/persona/index');
});
Route::get('/admin/persona/dni', 'PersonaController@dni');
Route::get('/admin/persona/deuda/{id}', 'PersonaController@deuda');
Route::post('/admin/persona/pagar', 'PersonaController@pagar');
Route::post('/admin/persona/guardar', 'PersonaController@guardar');


