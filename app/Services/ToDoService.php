<?php

namespace App\Services;

use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Interfaces\Services\Methods\IndexInterface;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Repositories\ToDoRepository;

class ToDoService implements ToDoServiceInterface
{
    private ToDoRepositoryInterface $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    public function index(array $data = []): array
    {
        $todos = $this->toDoRepository->getAll();
        return [
            'todos' => $todos,
        ];
    }
}
