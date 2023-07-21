<?php

namespace App\Providers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('check_nomor_induk', function ($value) {
            return Karyawan::where('nomor_induk', $value)->exists();
        });
    }
}
