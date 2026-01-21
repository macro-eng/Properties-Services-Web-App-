<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Http\Controllers\Api\AuthController;
Route::prefix("/v1")->group(function(){
    Route::post("/login",[AuthController::class,"login"]);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
