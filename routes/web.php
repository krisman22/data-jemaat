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
    
    Route::get('/kartu-jemaat', 'KartuJemaatController@index')->name('kartujemaat');
    Route::get('/kartu-jemaat/{data_jemaat}', 'KartuJemaatController@show')->name('lihatdatakk');
    Route::get('/cetak-kartu/{data_jemaat}', 'KartuJemaatController@cetak_pdf')->name('cetakpdf');
    Route::get('/cetakpdf', 'KartuJemaatController@cetakkartu')->name('cetakkartu');

    Route::get('/data-jemaatmeninggal', 'JemaatInAktifController@meninggal')->name('datameninggal');
    Route::get('/data-jemaatpindah', 'JemaatInAktifController@pindah')->name('datapindah');

    Route::get('/rekap-lingkungan', 'RekapDataController@lingkungan');
    Route::get('/rekap-kepalakeluarga', 'RekapDataController@kepalakeluarga');
    Route::get('/rekap-jenis-kelamin', 'RekapDataController@jeniskelamin');
    Route::get('/rekap-jenis-usia', 'RekapDataController@jenisusia');
    Route::get('/rekap-status-perkawinan', 'RekapDataController@statusperkawinan');
    Route::get('/rekap-pendidikan', 'RekapDataController@pendidikan');
    Route::get('/rekap-pekerjaan', 'RekapDataController@pekerjaan');
    Route::get('/rekap-pekerjaan/show', 'RekapDataController@getPekerjaan')->name('getPekerjaan');
    Route::get('/rekap-jemaat-bergabung', 'RekapDataController@jemaatbergabung');

    Route::get('/grafik-lingkungan', 'GrafikController@lingkungan');
    Route::get('/grafik-jenis-kelamin', 'GrafikController@jeniskelamin');
    Route::get('/grafik-jenis-usia', 'GrafikController@jenisusia');
    Route::get('/grafik-status-perkawinan', 'GrafikController@statusperkawinan');
    Route::get('/grafik-pendidikan', 'GrafikController@pendidikan');
    Route::get('/grafik-pekerjaan', 'GrafikController@pekerjaan');
    Route::get('/grafik-jemaat-bergabung', 'GrafikController@jemaatbergabung');

    Route::get('/data-lingkungan', 'DataMasterController@index')->name('datalingkungan');
    Route::post('/data-lingkungan', 'DataMasterController@storeLingkungan')->name('lingkungan.store');


});

Auth::routes();

