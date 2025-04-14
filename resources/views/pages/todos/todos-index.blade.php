@extends('layouts.app')

@section('content')
    <div class="card">

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


        <div class="add-task">
            <a href="{{ route('todos.create') }}">
                <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button>
            </a>
        </div>

        @if ($todos->isEmpty())
            <div class="empty-state" id="emptyState">
                {{-- <img src="/api/placeholder/120/120" alt="Liste vide"> --}}
                <h3>Aucune tâche pour le moment</h3>
                <p>Ajoutez votre première tâche pour commencer</p>
                {{-- <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button> --}}
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

    {{-- <div class="modal" id="taskModal">
        <div class="modal-content">
            <h2 id="modalTitle">Modifier la tâche</h2>
            <form id="taskForm" action="{{ route('todos.index') }}" method="post">
                @csrf
                <input type="hidden" id="taskId">
                <div class="form-group">
                    <label for="taskTitle">Titre de la tâche</label>
                    <input type="text" id="taskTitle" name="title" required>
                </div>
                <div class="form-group">
                    <label for="taskDescription">Description de la tâche</label>
                    <textarea type="text" id="taskDescription" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="taskCategory">Categorie de la tache</label>
                    <select id="taskCategory" name="category">
                        <option value="" disabled selected>Choissiez une categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="taskStatus">Statut de la tâche</label>
                    <select id="taskStatus" name="status">
                        <option value="" disabled selected>Choissiez un statut</option>
                        <option value="in-progress">En cours</option>
                        <option value="completed">Terminé</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="taskStartDate">Date debut</label>
                    <input type="date" id="taskStartDate" name="start_date">
                </div>
                <div class="form-group">
                    <label for="taskEndDate">Date fin</label>
                    <input type="date" id="taskEndDate" name="end_date">
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div> --}}

    <form action="{{ route('todos.index') }}" method="post" delete id="deleteForm" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <form action="{{ route('todos.toggle.completed', ':id') }}" method="post" id="toggleForm" style="display: none;">
        @csrf
        @method('PATCH')
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/todos.js') }}"></script>
@endsection
