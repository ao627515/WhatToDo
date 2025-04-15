<?php

namespace App\Factories\Todo;

// use App\Filters\Todo\TodoFilterInterface;
use App\Filters\Todo\TitleFilter;
use App\Filters\Todo\StatusFilter;
use App\Filters\Todo\CategoryFilter;
use App\Interfaces\Filters\FilterInterface;
use App\Interfaces\Factories\FilterFactoryInterface;

class ToDoFilterFactory implements FilterFactoryInterface
{
    /**
     * @return FilterInterface[]
     */
    public static function build(array $data): array
    {
        $filters = [];

        if (!empty($data['query'])) {
            $filters[] = new TitleFilter($data['query']);
        }

        if (!empty($data['status'])) {
            $filters[] = new StatusFilter($data['status']);
        }

        if (!empty($data['category'])) {
            $filters[] = new CategoryFilter($data['category']);
        }

        return $filters;
    }
}
