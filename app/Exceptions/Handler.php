<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Auth\AuthenticationException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is('admin-dashboard') || $request->is('admin-dashboard/*')) {
            return redirect()->route('admin.login')->with('error_message', 'Please login first to continue this operation');
        }
        if ($request->is('users-dashboard') || $request->is('users-dashboard/*')) {
            return redirect()->route('customer.login')->with('error_message', 'Please login first to continue this operation');
        }
        if ($request->is('customerusers-dashboard') || $request->is('customerusers-dashboard/*')) {
            return redirect()->route('customerusers.login')->with('error_message', 'Please login first to continue this operation');
        }
		
		return redirect()->route('home')->with('error_message', 'Please login first to continue this operation');
    }	
}
