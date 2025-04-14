<?php

namespace App\Factories\Todo;

// use App\Filters\Todo\TodoFilterInterface;
use App\Filters\Todo\TitleFilter;
use App\Filters\Todo\StatusFilter;
use App\Interfaces\Factories\FilterFactoryInterface;
use App\Interfaces\Filters\FilterInterface;

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

        return $filters;
    }
}
