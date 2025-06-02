<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Central\Frontend\HomeController;


Route::get('/',[HomeController::class,'index'])->name('frontend.home');
