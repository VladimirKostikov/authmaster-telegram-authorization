<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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



Route::get('/dashboard', function () {
    return redirect()->route('sites_list');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('language')->group(function () {
    Route::get('/', function () { return view('welcome');})->name('/');
    Route::controller(AuthController::class)->group(function () {
        Route::prefix('/authorization')->group(function () {
            Route::get('/create/{site_id}', 'create')->name('auth_create');
            Route::get('/view/{id}', 'view')->name('auth_view');
        });
    });
});

Route::middleware('auth', 'language')->group(function () {
    Route::get('/lang/{lang}', function(string $lang) {
        session(['lang' => $lang]);
        return redirect()->back();
    })->name('setLang');
    
    // Profile management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Site management
    Route::controller(SiteController::class)->group(function () {
        Route::prefix('sites')->group(function () {
            Route::get('/list', 'list')->name('sites_list');
            Route::get('/view/{id}', 'view')->name('sites_view');
            Route::get('/check/{id}', 'checkPermissionOnSite')->name('sites_check');
            Route::get('/toggle/{id}', 'toggle')->name('sites_toggle');

            Route::view('/add', 'sites.add')->name('sites_add');

            Route::post('/create', 'create')->name('sites_form_create');
            Route::post('/update', 'update')->name('sites_form_update');
        });
    });

    // List of authorizations
    Route::controller(CodeController::class)->group(function () {
        Route::prefix('codes')->group(function () {
            Route::get('/list', 'list')->name('codes_list');
            Route::get('/site/{id}', 'site')->name('codes_site');
            Route::get('/view/{id}', 'view')->name('codes_view');
        });
    });

    // View pages
    Route::view('/support', 'pages.support')->name('support');
    Route::view('/donate', 'pages.donate')->name('donate');
    Route::view('/about', 'pages.about')->name('about');
});

require __DIR__.'/auth.php';
