<?php

use App\Http\Controllers\Tenant\Frontend\HomeController;
use App\Http\Controllers\Tenant\Frontend\AuthController;
use Illuminate\Support\Facades\Route; 

Route::get('/', [HomeController::class, 'index'])->name('home'); 


