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
        $this->mapReportRoutes();
    }

    protected function mapCustomerRoutes(): void
    {
        Route::prefix('customers')
            ->middleware('api')
            ->group(base_path('routes/customers.php'));
    }

    private function mapOrderRoutes(): void
    {
        Route::prefix('orders')
            ->middleware('api')
            ->group(base_path('routes/orders.php'));
    }

    private function mapReportRoutes(): void
    {
        Route::prefix('reports')
            ->middleware('api')
            ->group(base_path('routes/reports.php'));
    }
}
