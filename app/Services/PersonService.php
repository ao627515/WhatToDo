<?php

namespace App\Services;

use App\Interfaces\Services\PersonServiceInterface;

class PersonService implements PersonServiceInterface
{

    private PersonServiceInterface $peopleRepository;

    public function __construct(PersonServiceInterface $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }


    public function index(array $data = [])
    {
        return;
    }
}
