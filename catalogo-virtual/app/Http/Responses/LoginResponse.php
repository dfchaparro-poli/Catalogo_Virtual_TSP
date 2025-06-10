<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Handle the login response.
     */
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin');
        }

        if ($user->hasRole('user')) {
            return redirect()->intended('/user');
        }

        // Por si acaso
        return redirect()->intended('/dashboard');
    }
}