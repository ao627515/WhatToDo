<?php

namespace App\Interfaces\Repositories\Methods;

interface findOrCreateInterface
{
    public function findOrCreate(array $attributes = [], array $values = []);
}
