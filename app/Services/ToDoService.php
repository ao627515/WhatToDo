<?php

namespace App\Services;

use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Interfaces\Services\ToDoServiceInterface;

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

    public function store(array $data = []): array
    {
        $todo = $this->toDoRepository->create($data);
        return [
            'todo' => $todo,
        ];
    }
}
