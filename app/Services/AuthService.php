<?php

namespace App\Services;

use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Repositories\AuthRepositoryInterface;

class AuthService implements AuthServiceInterface
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function signin(array $credentials, $remenber = false)
    {
        return $this->authRepository->attempt($credentials, $remenber) ? $this->authRepository->user() : null;
    }
    public function signout()
    {
        $this->authRepository->logout();
    }
}
