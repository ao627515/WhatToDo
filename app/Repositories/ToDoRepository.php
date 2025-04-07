<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Models\ToDo;

class ToDoRepository implements ToDoRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = ToDo::class;
    }
    public function getAll(array $column = ['*'])
    {
        return $this->model::all($column);
    }

    public function create(array $attributes = []): array
    {
        return $this->model::create($attributes)->toArray();
    }
}
