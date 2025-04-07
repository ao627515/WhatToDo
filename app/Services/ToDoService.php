<?php

namespace App\Services;

use App\Interfaces\Repositories\ToDoRepositoryInterface;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Models\ToDo;

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

    public function show(string|int $id, array $data = [])
    {
        $todo = $this->toDoRepository->getById($id);
        return [
            'todo' => $todo,
        ];
    }

    public function update(string|int $id, $data = [])
    {
        $todo = $this->toDoRepository->update($id, $data);
        return [
            'todo' => $todo,
        ];
    }

    public function destroy(string|int $id)
    {
        return $this->toDoRepository->delete($id);
    }
}
