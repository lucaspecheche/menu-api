<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        $this->mapCustomerRoutes();
    }

    protected function mapCustomerRoutes(): void
    {
        Route::prefix('customers')
            ->middleware('api')
            //->namespace($this->namespace)
            ->group(base_path('routes/customer.php'));
    }
}
