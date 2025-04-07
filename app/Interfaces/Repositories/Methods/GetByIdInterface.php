<?php

namespace App\Interfaces\Repositories\Methods;

use Illuminate\Database\Eloquent\Model;

interface GetByIdInterface
{
    public function getById(int $id, array $column = ['*']);
    // public function getByIdWithModel(Model $id, array $column = ['*']);
}
