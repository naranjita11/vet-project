<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\OwnerController;
use App\Http\Controllers\API\Owners\AnimalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "owners"], function () {
    Route::get("", [OwnerController::class, "index"]);
    Route::post("", [OwnerController::class, "store"]);

    Route::group(["prefix" => "{owner}"], function () {
        Route::get("", [OwnerController::class, "show"]);
        Route::put("", [OwnerController::class, "update"]);
        Route::delete("", [OwnerController::class, "destroy"]);

        Route::group(["prefix" => "animals"], function () {
            Route::get("", [AnimalController::class, "index"]);
            Route::post("", [AnimalController::class, "store"]);

            Route::group(["prefix" => "{animal}"], function () {
                Route::get("", [AnimalController::class, "show"]);
                Route::put("", [AnimalController::class, "update"]);
                Route::delete("", [AnimalController::class, "destroy"]);
            });
        });
    });
});

