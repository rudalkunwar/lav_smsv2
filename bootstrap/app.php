<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/api.php'));
        },
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Custom\Admin::class,
            'super_admin' => \App\Http\Middleware\Custom\SuperAdmin::class,
            'teamSA' => \App\Http\Middleware\Custom\TeamSA::class,
            'teamSAT' => \App\Http\Middleware\Custom\TeamSAT::class,
            'teamAccount' => \App\Http\Middleware\Custom\TeamAccount::class,
            'examIsLocked' => \App\Http\Middleware\Custom\ExamIsLocked::class,
            'my_parent' => \App\Http\Middleware\Custom\MyParent::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
