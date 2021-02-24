<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\HomeController;

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


Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');


// this group just adds the prefix of owners to the URL
Route::group(["prefix" => "owners"], function () {
    
    //put behid the auth middleware
    // need to be logged in to use
    Route::group(["middleware" => "auth"], function () {
        Route::get('/create', [OwnerController::class, "create"]);
        Route::post('/create', [OwnerController::class, "createPost"]);
    });

    // don't need to be logged in to view
    Route::get('/', [OwnerController::class, "index"]);
    Route::get('/{owner}', [OwnerController::class, "show"]);
});

