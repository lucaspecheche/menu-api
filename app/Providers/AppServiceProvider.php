<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        $this->initialDatabase();
    }

    private function initialDatabase(): void
    {
        $database = config('database.connections.sqlite.database');

        if(!file_exists($database)) {
            file_put_contents($database, '');
        }
    }
}
