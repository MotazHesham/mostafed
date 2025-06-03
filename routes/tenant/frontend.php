<?php

use App\Http\Controllers\Tenant\Frontend\HomeController;
use Illuminate\Support\Facades\Route; 

Route::get('/', [HomeController::class, 'index']); 