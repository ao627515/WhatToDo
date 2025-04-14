<?php

namespace App\Interfaces\Filters;

use Illuminate\Database\Eloquent\Builder;

interface TodoFilterInterface
{
    public function apply(Builder $query): Builder;
}
