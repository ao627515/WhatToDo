<?php

namespace App\Interfaces\Services\Methods;

interface UpdateInterface
{
    public function update(string|int $id, $data = []);
}
