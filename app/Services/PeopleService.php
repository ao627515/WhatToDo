<?php

namespace App\Services;

use App\Interfaces\Services\PeopleServiceInterface;

class PeopleService implements PeopleServiceInterface
{

    private PeopleServiceInterface $peopleRepository;

    public function __construct(PeopleServiceInterface $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }


    public function index(array $data = [])
    {
        return;
    }
}
