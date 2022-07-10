<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/songs', [App\Http\Controllers\HomeController::class, 'songlist'])->name('songs');
Route::get('/add-song', [App\Http\Controllers\HomeController::class, 'addSong'])->name('addSong');
Route::post('/add-song-form', [App\Http\Controllers\HomeController::class, 'addSongForm'])->name('addSongForm');
Route::post('/add-artist-form', [App\Http\Controllers\HomeController::class, 'addArtistForm'])->name('addArtistForm');