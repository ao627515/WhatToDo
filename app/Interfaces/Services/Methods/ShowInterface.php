<?php

namespace App\Interfaces\Services\Methods;

interface ShowInterface
{
    public function show(string|int $id, array $column = ['*']);
}
