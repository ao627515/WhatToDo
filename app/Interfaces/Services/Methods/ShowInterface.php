<?php

namespace App\Interfaces\Services\Methods;

interface ShowInterface
{
    public function show(int $id, array $column = ['*']);
}
