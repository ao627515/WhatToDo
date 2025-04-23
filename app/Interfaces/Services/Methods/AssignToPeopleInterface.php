<?php

namespace App\Interfaces\Services\Methods;

interface AssignToPeopleInterface
{
    public function assignToPeople(int|string $id, array $peopleIds = []);
}
