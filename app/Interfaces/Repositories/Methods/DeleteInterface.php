<?php

namespace App\Interfaces\Repositories\Methods;

use Illuminate\Database\Eloquent\Model;

interface DeleteInterface
{
    public function delete(int $id);
    // public function deleteByModel(Model $model): bool;
}