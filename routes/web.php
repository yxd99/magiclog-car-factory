<?php

use Illuminate\Support\Facades\Route;use App\Http\Controllers\UsersController;
 
Route::resource('/cars', App\Http\Controllers\CarController::class);
Route::fallback(function () {
    return redirect('/cars');
});
