<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            foreach (config('tenancy.central_domains') as $domain) {
                Route::domain($domain)->group(function () {
                    Route::middleware('web')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/central/admin.php'));

                    Route::middleware('web')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/central/frontend.php'));
                });
            }
            
            Route::middleware([
                'web',
                \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
                \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
            ])->group(function () { 
                Route::namespace($this->namespace)
                    ->group(base_path('routes/tenant/admin.php'));
                Route::namespace($this->namespace)
                    ->group(base_path('routes/tenant/frontend.php'));
                Route::namespace($this->namespace)
                    ->group(base_path('routes/tenant/beneficiary.php'));
            }); 
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
