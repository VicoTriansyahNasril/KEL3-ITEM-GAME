<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GameController;



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
Route::delete('/game/{id}', [GameController::class, 'destroy'])->name('game.destroy');

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
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});



