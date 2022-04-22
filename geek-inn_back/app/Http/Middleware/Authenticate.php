<?php

namespace App\Http\Middleware;

use GuzzleHttp\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }
}