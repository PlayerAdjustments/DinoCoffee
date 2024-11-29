<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            /**
             * Developer
             */
            __DIR__ . '/../routes/Developer/developer_web.php',
            __DIR__ . '/../routes/Developer/developer_users_web.php',
            __DIR__ . '/../routes/Developer/developer_schools_web.php',
            __DIR__ . '/../routes/Developer/developer_careers_web.php',
            __DIR__ . '/../routes/Developer/developer_careercodes_web.php',
            __DIR__ . '/../routes/Developer/developer_subjects_web.php',
            __DIR__ . '/../routes/Developer/developer_generations_web.php',
            __DIR__ . '/../routes/Developer/developer_studyplans_web.php',
            __DIR__ . '/../routes/Developer/developer_schedules_web.php',
            __DIR__ . '/../routes/Developer/developer_midterms_web.php',

        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\Role::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
