<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\HomeLogoController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\RecentworkController;
use App\Http\Controllers\Admin\AboutController;

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

Route::get('/', [AdminController::class, 'MainPage']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::resource('home-section', HomeSectionController::class);
        Route::resource('home-logo', HomeLogoController::class);
        Route::resource('service', ServicesController::class);
        Route::resource('client-section', ClientController::class);
        Route::resource('recent-work', RecentworkController::class);
        Route::resource('about', AboutController::class);
        Route::get('logout', [AboutController::class, 'perform'])->name('logout.perform');
    });
});
