@extends('layouts.app')

@section('content')
    <div class="todo-card">

        <form action="{{ route('todos.index') }}" method="get" id="searchForm">
            @csrf
            <div class="search-bar">
                <input type="text" id="searchInput" name="query" value="{{ $query }}"
                    placeholder="Rechercher une tâche...">
                <select id="statusFilter" name="status">
                    <option value="all" @selected($status === 'all')>Tous les statuts</option>
                    <option value="in-progress" @selected($status === 'in-progress')>En cours</option>
                    <option value="completed" @selected($status === 'completed')>Terminé</option>
                </select>
                <button class="btn-secondary" id="searchBtn">Rechercher</button>
                <button type="reset" class="btn-secondary" id="resetBtn">Reenitialise</button>
            </div>
        </form>

        {{-- <form action="{{ route('todos.store') }}" method="post"> --}}
        {{-- @csrf --}}
        <div class="add-task">
            {{-- <input type="text" id="newTaskInput" placeholder="Ajouter une nouvelle tâche..." name="title" required>
                <textarea name="description" placeholder="Description" id=""></textarea> --}}
            {{-- <button class="btn-primary" id="addTaskBtn">Ajouter</button> --}}
            <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button>
        </div>
        {{-- </form> --}}

        @if ($todos->isEmpty())
            <div class="empty-state" id="emptyState">
                <img src="/api/placeholder/120/120" alt="Liste vide">
                <h3>Aucune tâche pour le moment</h3>
                <p>Ajoutez votre première tâche pour commencer</p>
                <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button>
            </div>
        @else
            <ul class="tasks-list" id="tasksList">
                @php
                    $todosCompleted = $todos->where('completed', true);
                    $todosNotCompleted = $todos->where('completed', false);
                @endphp
                <!-- Les tâches seront ajoutées ici dynamiquement -->
                @foreach ($todosNotCompleted as $todo)
                    <x-todo-item :todo="$todo" />
                @endforeach
                <hr>
                @foreach ($todosCompleted as $todo)
                    <x-todo-item :todo="$todo" />
                @endforeach
            </ul>
        @endif
    </div>
@endsection
