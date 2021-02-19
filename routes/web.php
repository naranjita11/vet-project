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

// the '/' part is the URL path
// the "index" or "show" bits at the end are methods on the controller which define the view that gets outputted to the user
Route::get('/', [HomeController::class, "index"]);

// this group just adds the prefix of owners to the URL
Route::group(["prefix" => "owners"], function () {
    Route::get('/', [OwnerController::class, "index"]);
    Route::get('/create', [OwnerController::class, "create"]);
    Route::post('/create', [OwnerController::class, "createPost"]);
    Route::get('/{owner}', [OwnerController::class, "show"]);
});
