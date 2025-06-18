<?php

namespace App\Http\Controllers\Tenant\Beneficiary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beneficiary = auth()->user()->beneficiary;
        return view('tenant.beneficiary.home', compact('beneficiary'));
    }
}
