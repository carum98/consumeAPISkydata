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

Route::get('/home', 'WelcomeController@showWelcomePage')->name('welcome');

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('authorization', 'Auth\LoginController@authorization')->name('authorization');


Route::get('/radio/{id}', 'RadioController@showRadio')->name('radio.show');
Route::get('/cliente/{id}', 'ClienteController@showCliente')->name('cliente.show');
Route::get('/cliente/{id}/radios', 'ClienteController@showRadiosCliente')->name('radios.cliente.show');


