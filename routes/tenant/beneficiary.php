<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Frontend\HomeController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;  

 