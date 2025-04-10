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
        return $this->model::select($column)->get();
    }
}