<?php

use App\Http\Controllers\BookingDetailsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RoomsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'rooms', 'as' => 'rooms.'], function () {
    Route::get('/', [RoomsController::class, 'index'])->name('index');
    Route::get('/create', [RoomsController::class, 'create'])->name('create');
    Route::post('store', [RoomsController::class, 'store'])->name('store');
    Route::get('/{room}/show', [RoomsController::class, 'show'])->name('show');
    Route::get('/{room}/edit', [RoomsController::class, 'edit'])->name('edit');
    Route::put('/{room}/update', [RoomsController::class, 'update'])->name('update');
    Route::delete('/{room}/destroy', [RoomsController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'bookingDetails', 'as' => 'bookingDetails.'], function () {
    Route::get('/', [BookingDetailsController::class, 'index'])->name('index');
    Route::get('/create', [BookingDetailsController::class, 'create'])->name('create');
    Route::post('store', [BookingDetailsController::class, 'store'])->name('store');
    Route::get('/{bookingDetail}/show', [BookingDetailsController::class, 'show'])->name('show');
    Route::get('/{bookingDetail}/edit', [BookingDetailsController::class, 'edit'])->name('edit');
    Route::put('/{bookingDetail}/update', [BookingDetailsController::class, 'update'])->name('update');
    Route::delete('/{bookingDetail}/destroy', [BookingDetailsController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/create', [GalleryController::class, 'create'])->name('create');
    Route::post('store', [GalleryController::class, 'store'])->name('store');
    Route::get('/{post}/show', [GalleryController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [GalleryController::class, 'edit'])->name('edit');
    Route::put('/{post}/update', [GalleryController::class, 'update'])->name('update');
    Route::delete('/{post}/destroy', [GalleryController::class, 'destroy'])->name('destroy');
});