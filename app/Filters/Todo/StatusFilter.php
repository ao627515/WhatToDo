<?php

namespace App\Filters\Todo;

use App\Interfaces\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\Filters\TodoFilterInterface;

class StatusFilter implements FilterInterface
{
    private string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function apply(Builder $query): Builder
    {
        if ($this->status === 'all') return $query;

        $completed = $this->status === 'completed';
        return $query->where('completed', $completed);
    }
}
