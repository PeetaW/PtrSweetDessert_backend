<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Http\Middleware\HandleCors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 啟用sanctum，確保前端請求為狀態化
        $middleware->append(EnsureFrontendRequestsAreStateful::class);
        // 啟用CORS，因為是前後端分離，跨域請求的保護措施
        $middleware->append(HandleCors::class);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
date_default_timezone_set(env('APP_TIMEZONE', 'Asia/Taipei'));
