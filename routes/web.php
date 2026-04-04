<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/city/{slug}', [cityController::class, 'show'])->name('city.show');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');

Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
