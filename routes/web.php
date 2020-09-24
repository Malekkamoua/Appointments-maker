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

Route::get('/', 'Controller@login')->name('login');
 
Route::post('/rendez-vous-covid', 'Controller@createFiche')->name('createFiche');

Route::post('/rendez-vous-covid/engerister', 'Controller@storeFiche')->name('storeFiche');

Route::post('/rendez-vous-covid/annuler', 'Controller@annulerRdv')->name('annulerRdv');


