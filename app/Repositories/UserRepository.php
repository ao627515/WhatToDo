<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct()
    {
        $this->model = User::class;
    }

    public function create(array $attributes = [])
    {
        return $this->model::create($attributes);
    }
}
