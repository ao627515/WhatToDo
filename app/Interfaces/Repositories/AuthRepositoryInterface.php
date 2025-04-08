<?php

namespace App\Interfaces\Repositories;

interface AuthRepositoryInterface
{
    public function attempt(array $credentials, $remember = false);

    public function logout();

    public function user();
}
