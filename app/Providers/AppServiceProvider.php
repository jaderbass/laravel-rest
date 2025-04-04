<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('website_link', function () {
            $app_url = url(config('app.url'));
            return "<a target='_blank' href='$app_url'>$app_url</a>";
        });

        Blade::directive('dates2german', function ($date) {
            $pieces = explode(' ', (string)$date);
            $dPieces = explode('-', $pieces[0]);
            $date = $dPieces[2] . '.' . $dPieces[1] . '.' . $dPieces[0] . ' ' . $pieces[1];
            return $date;
        });
    }
}
