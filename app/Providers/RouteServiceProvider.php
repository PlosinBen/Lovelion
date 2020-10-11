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
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->memberRoute();

            $this->ledgerRoute();
            //$this->futuresRoute();


//            Route::prefix('api')
//                ->middleware('api')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/api.php'));
//
//            Route::middleware('web')
//                ->namespace($this->namespace)
//                ->group(base_path('routes/web.php'));
        });
    }

    private function mergeDomain(?string $subDomain)
    {
        $subDomain = strtoupper($subDomain);
        return env("{$subDomain}_SUBDOMAIN") . env('SESSION_DOMAIN');
    }

    protected function memberRoute()
    {
        Route::middleware('web')
            ->namespace("{$this->namespace}\Member")
            ->domain($this->mergeDomain('member'))
            ->as('member.')
            ->group(base_path("routes/member.php"));
    }

    protected function ledgerRoute()
    {
        Route::middleware(['web', 'auth'])
            ->namespace("{$this->namespace}\Ledger")
            ->domain($this->mergeDomain('ledger'))
            ->as('ledger.')
            ->group(base_path("routes/ledger.php"));
    }

    protected function futuresRoute()
    {
        Route::middleware(['web', 'auth'])
            ->namespace("{$this->namespace}\Futures")
            ->domain($this->mergeDomain('futures'))
            ->as('futures.')
            ->group(base_path('routes/futures.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
