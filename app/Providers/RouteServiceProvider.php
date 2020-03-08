<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        $this->mapCustomerRoutes();
        $this->mapOrderRoutes();
    }

    protected function mapCustomerRoutes(): void
    {
        Route::prefix('customers')
            ->middleware('api')
            //->namespace($this->namespace)
            ->group(base_path('routes/customers.php'));
    }

    private function mapOrderRoutes()
    {
        Route::prefix('orders')
            ->middleware('api')
            //->namespace($this->namespace)
            ->group(base_path('routes/orders.php'));
    }
}
