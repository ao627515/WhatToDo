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
}
