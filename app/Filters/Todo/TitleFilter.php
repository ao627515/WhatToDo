<?php

namespace App\Filters\Todo;

use App\Interfaces\Filters\TodoFilterInterface;
use Illuminate\Database\Eloquent\Builder;

class TitleFilter implements TodoFilterInterface
{
    private string $search;

    public function __construct(string $search)
    {
        $this->search = $search;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('title', 'like', '%' . $this->search . '%');
    }
}
