<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = Category::class;
    }
    public function create(array $attributes = [])
    {
        return $this->model::create($attributes);
    }

    public function getAll(array $column = ['*'])
    {
        return $this->model::all();
    }

    public function getById(string|int $id, array $column = ['*'])
    {
        return $this->model::findOrFail($id, $column);
    }

    public function update(int|string $id, $attributes = [])
    {
        $category = $this->getById($id);
        return $category->update($attributes);
    }

    public function delete(int|string $id)
    {
        $category = $this->getById($id);
        return $category->delete();
    }
}