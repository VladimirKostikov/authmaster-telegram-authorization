<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::prefix('/authorization')->group(function () {
        Route::get('/create/{site_id}', 'create')->name('auth_create');
        Route::get('/view/{id}', 'view')->name('auth_view');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(SiteController::class)->group(function () {
        Route::prefix('sites')->group(function () {
            Route::get('/list', 'list')->name('sites_list');
            Route::get('/view/{id}', 'view')->name('sites_view');
            Route::get('/check/{id}', 'checkPermissionOnSite')->name('sites_check');
            Route::get('/toggle/{id}', 'toggle')->name('sites_toggle');

            Route::view('/add', 'sites.add')->name('sites_add');

            Route::post('/create', 'create')->name('sites_form_create');
        });
    });

    Route::controller(TokenController::class)->group(function () {
        Route::get('/tokens', 'list')->name('tokens_list');
    });

    Route::controller(CodeController::class)->group(function () {
        Route::prefix('logs')->group(function () {
            Route::get('/list', 'list')->name('logs_list');
            Route::get('/view/{id}', 'view')->name('logs_view');
        });
    });

    // View pages
    Route::view('/faq', 'pages.faq')->name('faq');
    Route::view('/rates', 'pages.rates')->name('rates');
});

require __DIR__.'/auth.php';
