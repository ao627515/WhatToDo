@extends('layouts.app')

@section('content')
    {{-- @dump($errors->all()) --}}
    <div class="todo-card">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Rechercher une tâche...">
            <select id="statusFilter">
                <option value="all">Tous les statuts</option>
                <option value="pending">En attente</option>
                <option value="in-progress">En cours</option>
                <option value="completed">Terminé</option>
            </select>
            <button class="btn-secondary" id="searchBtn">Rechercher</button>
        </div>

        <form action="{{ route('todos.store') }}" method="post">
            @csrf
            <div class="add-task">
                <input type="text" id="newTaskInput" placeholder="Ajouter une nouvelle tâche..." name="title" required>
                <button class="btn-primary" id="addTaskBtn">Ajouter</button>
            </div>
        </form>

        @if (empty($todos))
            <div class="empty-state" id="emptyState">
                <img src="/api/placeholder/120/120" alt="Liste vide">
                <h3>Aucune tâche pour le moment</h3>
                <p>Ajoutez votre première tâche pour commencer</p>
                <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button>
            </div>
        @else
            <ul class="tasks-list" id="tasksList">
                <!-- Les tâches seront ajoutées ici dynamiquement -->
                @foreach ($todos as $todo)
                    <x-todo-item :todos="$todo" />
                @endforeach
            </ul>
        @endif
    </div>
@endsection
