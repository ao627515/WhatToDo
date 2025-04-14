<?php

namespace App\Services;

use App\Enum\NoCategoryEnum;
use Illuminate\Support\Facades\DB;
use App\Exceptions\CannotDeleteNoCategoryException;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;

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

    // public function show(int|string $id, array $column = ['*'])
    // {
    //     return $this->categoryRepository->getById($id, $column);
    // }


    public function update(int|string $id, $attributes = [])
    {
        return $this->categoryRepository->update($id, $attributes);
    }

    public function delete(int|string $id)
    {
        return DB::transaction(function () use ($id) {
            $category = $this->categoryRepository->getById($id);

            $this->ensureCategoryCanBeDeleted($category);

            $noCategory = $this->getNoCategoryCategory();

            $category->todos()->update(['category_id' => $noCategory->id]);

            return $this->categoryRepository->delete($id);
        });
    }

    private function ensureCategoryCanBeDeleted($category): void
    {
        if ($category->label === NoCategoryEnum::NoCategory->value) {
            throw new CannotDeleteNoCategoryException();
        }
    }

    public function getNoCategoryCategory()
    {
        return $this->categoryRepository->findOrCreate([
            'label' => NoCategoryEnum::NoCategory->value
        ], [
            'label' =>
            NoCategoryEnum::NoCategory->value
        ]);
    }
}
