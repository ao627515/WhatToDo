<?php

namespace App\Interfaces\Repositories\Methods;

interface UpdateInterface
{
    public function update(string|int $id, $attributes = []);
}
