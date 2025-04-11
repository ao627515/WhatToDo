<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Services\ToDoServiceInterface;
use App\Interfaces\Repositories\ToDoRepositoryInterface;

class ToDoService implements ToDoServiceInterface
{
    private ToDoRepositoryInterface $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    public function index(array $data = [])
    {
        // Obtenir une instance de la requête sur les tâches via le repository
        $query = $this->toDoRepository->query();

        // Appliquer le filtre sur le titre si fourni
        if (!empty($data['query'])) {
            $query->where('title', 'like', '%' . $data['query'] . '%');
        }

        // Appliquer le filtre sur le statut si fourni
        if (!empty($data['status']) && $data['status'] !== 'all') {
            $isCompleted = $data['status'] === 'completed';
            $query->where('completed', $isCompleted);
        }

        // Appliquer le tri par défaut
        $query->orderBy('created_at', 'desc');

        $query->where('created_by', Auth::id());


        // Récupérer les tâches filtrées
        return $query->get();
    }

    public function store(array $data = [])
    {
        $data['created_by'] = Auth::id();
        $data['category_id'] = $data['category'];
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

    public function toggleCompleted(int|string $id)
    {
        $todo = $this->toDoRepository->getById($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return [
            'todo' => $todo,
        ];
    }
}
