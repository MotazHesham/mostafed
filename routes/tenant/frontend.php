<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Frontend\HomeController;


Route::get('/',[HomeController::class,'index'])->name('frontend.home');
