<?php

namespace App\Filters\Todo;

use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Filters\FilterInterface;

class CategoryFilter implements FilterInterface
{
    private int $categoryId;

    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('category_id', $this->categoryId);
    }
}
