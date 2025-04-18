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

    public function getById(int|string $id, array $column = ['*'])
    {
        return Person::find($id, $column);
    }

    public function delete(int|string $id)
    {
        $person = $this->getById($id);

        if ($person) {
            return $person->delete();
        }

        return false;
    }
}