<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::resource('/cars', CarController::class);
Route::fallback(function () {
    return redirect('/cars');
});
