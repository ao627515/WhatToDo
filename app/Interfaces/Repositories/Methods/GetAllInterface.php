<?php

namespace App\Interfaces\Repositories\Methods;

interface GetAllInterface
{
    public function getAll(array $column = ['*']);
}
