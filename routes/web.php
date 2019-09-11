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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'WelcomeController@showWelcomePage')->name('welcome')->middleware('auth');
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/radios', 'RadioController@radiolist')->name('radio.list');
Route::get('/radio/edit/{id}', 'RadioController@editForm')->name('edit.radio.form');
Route::post('/radio/edit/{id}', 'RadioController@edit')->name('edit.radio');
Route::get('/clientes', 'ClienteController@clienteslist')->name('cliente.list');
Route::get('authorization', 'Auth\LoginController@authorization')->name('authorization');

Route::get('/radio/{id}', 'RadioController@showRadio')->name('radio.show');
Route::get('/cliente/{id}', 'ClienteController@showCliente')->name('cliente.show');
Route::get('/cliente/{id}/radios', 'ClienteController@showRadiosCliente')->name('radios.cliente.show');

Route::get('/cliente/edit/{id}', 'ClienteController@editForm')->name('edit.cliente.form');
Route::post('/cliente/edit/{id}', 'ClienteController@edit')->name('edit.cliente');

Route::get('/crear/cliente', 'ClienteController@formCreateCliente')->name('form.cliente');
Route::post('/create/cliente', 'ClienteController@createCliente')->name('crear.cliente');


Route::get('/crear/radio', 'RadioController@formCreateRadio')->name('form.radio');
Route::post('/create/radio', 'RadioController@createRadio')->name('crear.radio');
