<?php

namespace App\Interfaces\Repositories\Methods;

interface CreateInterface
{
    public function create(array $attributes = []): array;
}
