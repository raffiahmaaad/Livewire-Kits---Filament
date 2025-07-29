<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Konfigurasi Folio
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                // Middleware yang akan diterapkan ke semua folio pages
                // 'web' middleware group sudah otomatis diterapkan
            ],
        ]);
    }
}
