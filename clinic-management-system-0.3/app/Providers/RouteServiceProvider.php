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
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // $routes = ['auth', 'patient', 'doctor'];
            // foreach ($routes as $route) {
            //     Route::prefix("api/$route")
            //         ->middleware('api')
            //         ->group(base_path("routes/api/$route.php"));
            // }
            Route::prefix('api/patient')
                ->middleware('api')
                ->group(base_path('routes/api/patient.php'));

            Route::prefix('api/doctor')
                ->middleware('api')
                ->group(base_path('routes/api/doctor.php'));

            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api/auth.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
