<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
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

// Route::view('/', 'welcome')->name('welcome');
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/destination', [HomeController::class, 'destination'])->name('destination');
Route::get('/destination/{id}', [DestinationController::class, 'destinationDetails'])->name('destination.detail');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');


Route::group(['middleware' => ['auth']], function() {

    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    Route::resource('categories', CategoryController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('beritas', BeritaController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('reviews', ReviewController::class);

});
