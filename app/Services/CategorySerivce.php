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
}