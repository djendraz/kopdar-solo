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

Route::resource('/peserta', 'PesertaController');
Route::get('/getData', 'PesertaController@getData')->name('getData');
Route::get('/pdf/{id}', 'PesertaController@generatePDF')->name('generatePDF');
Route::resource('/kehadiran', 'KehadiranController');
Route::get('/data/kehadiran', 'KehadiranController@dataTable')->name('data.kehadiran');
Route::get('/sertifikat', 'KehadiranController@sertifikat');
Route::get('/koreksi', 'KehadiranController@koreksi');
Route::post('/koreksi/data', 'KehadiranController@koreksiData');
Route::get('/getSertifikat', 'KehadiranController@getSertifikat')->name('getSertifikat');
Route::get('/sertifikatpdf/{id}', 'KehadiranController@sertifikatPDF')->name('sertifikatPDF');