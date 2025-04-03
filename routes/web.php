<?php

use App\Http\Controllers\LabelsController;
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/songs', SongsController::class);
Route::resource('/labels', LabelsController::class);