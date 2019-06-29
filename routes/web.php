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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/','HomeController');
    
    Route::get('/data-jemaat', 'DataJemaatController@index')->name('datajemaat');
    Route::get('/data-jemaat/profile/{data_jemaat}', 'DataJemaatController@show')->name('profiledetail');
    Route::get('/data-jemaat/profile/{data_jemaat}/edit', 'DataJemaatController@edit')->name('jemaateditprofile');
    Route::patch('/data-jemaat/{id}/update', 'DataJemaatController@update')->name('jemaatupdate');
    Route::patch('/data-jemaat/profile/{id}/update1', 'DataJemaatController@updateStatusPensiun')->name('updatestatuspensiun');
    Route::patch('/data-jemaat/profile/{id}/update2', 'DataJemaatController@updateStatusMeninggal')->name('updatestatusmeninggal');
    Route::patch('/data-jemaat/profile/{id}/update3', 'DataJemaatController@destroy')->name('hapusdatajemaat');
    
    Route::get('/tambah-jemaat', 'DataJemaatController@create')->name('tambahjemaat');
    Route::post('/tambah-jemaat', 'DataJemaatController@store')->name('tambahdatajemaat');
    
    

});

Auth::routes();

