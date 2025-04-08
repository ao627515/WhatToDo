<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function attempt(array $credentials, $remember = false)
    {
        return Auth::attempt($credentials, $remember);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function user()
    {
        return Auth::user();
    }
}
