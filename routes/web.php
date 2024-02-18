<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BookingDetailsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\FeedbacksController;
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
});//->name('home');

/*Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register',[AuthManager::class, 'register'])->name('register');
Route::post('/register',[AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout',[AuthManager::class, 'logout'])->name('logout');*/

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

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

Route::group(['prefix' => 'Galleries', 'as' => 'Galleries.'], function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/create', [GalleryController::class, 'create'])->name('create');
    Route::post('store', [GalleryController::class, 'store'])->name('store');
    Route::get('/{gallery}/show', [GalleryController::class, 'show'])->name('show');
    Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');
    Route::put('/{gallery}/update', [GalleryController::class, 'update'])->name('update');
    Route::delete('/{gallery}/destroy', [GalleryController::class, 'destroy'])->name('destroy');
    Route::delete('/{gallery}/deleteimage', [GalleryController::class, 'deleteimage']);
    Route::delete('/{gallery}/deletecover', [GalleryController::class, 'deletecover']);
});

Route::group(['prefix' => 'Feedbacks', 'as' => 'Feedbacks.'], function () {
    Route::get('/', [FeedbacksController::class, 'index'])->name('index');
    //Route::get('/create', [FeedbacksController::class, 'create'])->name('create');
    Route::post('store', [FeedbacksController::class, 'store'])->name('store');
    Route::get('/{Feedbacks}/show', [FeedbacksController::class, 'show'])->name('show');
    /*Route::get('/{Feedbacks}/edit', [FeedbacksController::class, 'edit'])->name('edit');
    Route::put('/{Feedbacks}/update', [FeedbacksController::class, 'update'])->name('update');*/
    Route::delete('/{Feedbacks}/destroy', [FeedbacksController::class, 'destroy'])->name('destroy');
});

