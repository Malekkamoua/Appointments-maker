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

Route::get('/', 'newController@login')->name('login');

Route::get('/calendar', 'newController@test')->name('test');

Route::post('/findDates', 'newController@findDates');
Route::post('/findTimes', 'newController@findTimes');

Route::post('/rendez-vous-covid', 'newController@createFiche')->name('createFiche');
Route::post('/rendez-vous-covid/engerister', 'newController@storeFiche')->name('storeFiche');
Route::post('/generate-pdf','newController@generatePDF');

Route::post('/annuler', 'newController@annulerRdv')->name('annulerRdv');

Route::get('/any-route', function () {
  Artisan::call('storage:link');
});

// Route::get('qrcode_blade', function () {
//     return view('qr-code');
// });

// Route::post('/rendez-vous-covid', 'Controller@createFiche')->name('createFiche');

// Route::post('/rendez-vous-covid/engerister', 'Controller@storeFiche')->name('storeFiche');



