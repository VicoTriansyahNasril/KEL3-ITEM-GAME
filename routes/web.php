<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\transaksiController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/game', [GameController::class, 'index'])->name('game.index');
Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');
Route::get('/game/{id}/edit', [GameController::class, 'edit'])->name('game.edit');
Route::put('/game/{id}', [GameController::class, 'update'])->name('game.update');
Route::delete('/delete-game/{id}', [GameController::class, 'destroy'])->name('game.destroy');

Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [transaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [transaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}', [transaksiController::class, 'show'])->name('transaksi.show');
Route::get('/transaksi/{id}/edit', [transaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [transaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [transaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/dataitem', [ItemController::class,'index'])->name('dataitem');
            Route::get('/tambahitem', [ItemController::class, 'tambahitem'])->name('tambahitem');
            Route::post('/insertitem', [ItemController::class, 'insertitem'])->name('insertitem'); 
            Route::get('/tampilitem/{id}', [ItemController::class, 'tampilitem'])->name('tampilitem');
            Route::post('/updateitem/{id}', [ItemController::class, 'updateitem'])->name('updateitem');   
            Route::get('/delete/{id}', [ItemController::class, 'delete'])->name('delete'); 
            Route::get('/exportpdf', [ItemController::class, 'exportpdf'])->name('exportpdf'); 
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});



