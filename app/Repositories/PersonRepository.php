<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PersonRepositoryInterface;
use App\Models\Person;

class PersonRepository implements PersonRepositoryInterface
{
    public function query()
    {
        return Person::query();
    }

    public function create(array $attributes = [])
    {
        return Person::create($attributes);
    }
}
