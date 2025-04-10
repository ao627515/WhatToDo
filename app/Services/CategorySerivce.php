<?php

namespace App\Services;

use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Services\CategoryServiceInterface;

class CategorySerivce implements CategoryServiceInterface
{

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(array $attributes = [])
    {
        return $this->categoryRepository->create($attributes);
    }

    public function index(array $data = [])
    {
        return $this->categoryRepository->getAll($data);
    }

    public function update(int|string $id, $attributes = [])
    {
        return $this->categoryRepository->update($id, $attributes);
    }

    public function delete(int|string $id)
    {
        return $this->categoryRepository->delete($id);
    }
}