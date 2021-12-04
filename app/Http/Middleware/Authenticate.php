<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        /*
        if (! $request->expectsJson()) {
            return route('login');
        }
        */
        if ($request->is('admin-dashboard') || $request->is('admin-dashboard/*')) {
            return redirect()->route('admin.login')->with('error_message', 'Please login first to continue this operation');
        }
        if ($request->is('users-dashboard') || $request->is('users-dashboard/*')) {
            return redirect()->route('customer.login')->with('error_message', 'Please login first to continue this operation');
        }
        if ($request->is('customerusers-dashboard') || $request->is('customerusers-dashboard/*')) {
            return redirect()->route('customerusers.login')->with('error_message', 'Please login first to continue this operation');
        }
    }
}
