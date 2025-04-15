<?php

namespace App\Services;

use App\Interfaces\Repositories\PersonRepositoryInterface;
use App\Interfaces\Services\PersonServiceInterface;

class PersonService implements PersonServiceInterface
{

    private PersonRepositoryInterface $peopleRepository;

    public function __construct(PersonRepositoryInterface $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }


    public function index(array $data = [])
    {
        return;
    }
}
