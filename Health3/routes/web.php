<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BMIController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect('beranda');
});

// Route::get('/bmi', function () {
//     return redirect('tampilbmi');
// });


    Route::get('beranda', [ArtikelController::class, 'tampilartikel']);
    // Route::get('tampilbmi', [ArtikelController::class, 'tampilbmi']);

    Route::resource('bmi', BMIController::class);


Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class);
});

Route::middleware(['auth', 'editor', 'admin'])->group(function () {
    Route::resource('artikel', ArtikelController::class);
    Route::resource('kategori', KategoriController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
