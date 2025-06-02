<?php

namespace App\Http\Controllers\Tenant\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('tenant.frontend.home');
    }
}
