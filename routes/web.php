<?php

use Illuminate\Support\Facades\Route;use App\Http\Controllers\UsersController;
 
Route::resource('/cars', App\Http\Controllers\CarController::class);
Route::get('/', function () {
    return redirect('/cars'); 
});