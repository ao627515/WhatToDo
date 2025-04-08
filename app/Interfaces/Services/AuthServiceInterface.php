<?php

namespace App\Interfaces\Services;

interface AuthServiceInterface
{
    public function signin(array $credentials, $remember = false);

    public function signout();
}
