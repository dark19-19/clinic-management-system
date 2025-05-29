<?php

use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsOrderManager;
use App\Http\Middleware\IsProductManager;
use App\Http\Middleware\IsSuperAdmin;
use App\Http\Middleware\IsUserManager;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => CheckUserRole::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
