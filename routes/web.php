<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventsController::class, 'index'])->name('app');