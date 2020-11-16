<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});


Route::group(['prefix' => 'admin'], function() {
   Route::group(['middleware' => ['auth', 'cekrole:1,2']], function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        // Pembayaran
        Route::resource('pembayaran', 'PembayaranController');
        // change Jumlah Bayar
        Route::get('changeJumlahBayar/{id}', 'PembayaranController@changeJumlahBayar');
   });
    
    // Master
    Route::group(['prefix' => 'master','middleware' => ['auth','cekrole:1']], function() {
    	// User
        // Route::resource('user', 'UserController');
        // Role
        Route::resource('role', 'RoleController');
        // Kompetensi
        Route::resource('kompetensi', 'KompetensiController');
        // Spp
        Route::resource('spp', 'SppController');
        // Kelas
        Route::resource('kelas', 'KelasController');
        // Petugas
        Route::resource('petugas', 'PetugasController');
        // Edit Petugas
        Route::post('petugas/edit-petugas/{id}', 'PetugasController@editPetugas');
        // Murid
        Route::resource('murid', 'MuridController');
        // Edit Murid
        Route::post('murid/edit-murid/{id}', 'MuridController@updateMurid');
    });


});

// murid
// History
Route::get('history-pembayaran', 'PembayaranController@history')->name('history')->middleware(['auth','cekrole:3']);

Route::get('login', 'AuthController@loginView')->name('login');
Route::post('login/post', 'AuthController@login')->name('loginPost');
Route::get('logout', 'AuthController@logout')->name('logout');