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

    public function getById(string|int $id, array $column = ['*'])
    {
        return $this->model::findOrFail($id, $column);
    }



    public function delete(string|int $id)
    {
        $todo = $this->getById($id);

        return $todo->delete();
    }

    public function update(int|string $id, $attributes = [])
    {
        $todo = $this->getById($id);

        return $todo->update($attributes);
    }

    public function query()
    {
        return  $this->model::query();
    }
}
