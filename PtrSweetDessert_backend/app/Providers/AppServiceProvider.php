<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
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
        // 強制 Laravel 的 Response Header `date` 使用 Asia/Taipei 時區
        Response::macro('withServerTimestamp', function ($response) {
            $response->header('date', Carbon::now()->toRfc7231String());
            return $response;
        });
    }
}
