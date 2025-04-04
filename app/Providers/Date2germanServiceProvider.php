<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Date2germanServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        Blade::directive('dates2german', function($date){
            $date = str_replace(' ', '#', $date);
            $pieces = explode(' ', (string)$date);
            // $date = var_dump($date);
            // $dPieces = explode('-', $pieces[0]);
            // $date = $dPieces[2] . '.' . $dPieces[1] . '.' . $dPieces[0] . ' ' . $pieces[1];
            return $pieces[0];
        });
    }
}
