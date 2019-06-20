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
    return view('pages.admin.index');
});

Route::get('/all-jemaat', function(){
    return view('pages.admin.jemaat.jemaat');
});

Route::get('/data-jemaat', 'dataJemaatController@index');
Route::get('/data-jemaat/profile/{data_jemaat}', 'dataJemaatController@show')->name('profiledetail');
Route::get('/data-jemaat/profile/{data_jemaat}/edit', 'dataJemaatController@edit')->name('jemaateditprofile');
Route::patch('/data-jemaat/{id}/update', 'dataJemaatController@update')->name('jemaatupdate');
Route::patch('/data-jemaat/profile/{id}/update1', 'DataJemaatController@updateStatusPensiun')->name('updatestatuspensiun');
Route::patch('/data-jemaat/profile/{id}/update2', 'DataJemaatController@updateStatusMeninggal')->name('updatestatusmeninggal');
Route::patch('/data-jemaat/profile/{id}/update3', 'DataJemaatController@destroy')->name('hapusdatajemaat');

Route::get('/lihat-data-jemaat', function () {
    return view('pages.admin.jemaat.edit-jemaat');
});



Route::get('/tambah-jemaat', 'dataJemaatController@create')->name('tambahjemaat');
Route::post('/tambah-jemaat', 'dataJemaatController@store')->name('tambahdatajemaat');
