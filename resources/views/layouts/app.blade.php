<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Todo List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div class="container">
        <header>
            <h1>Ma Todo List</h1>
        </header>

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
                    <input type="text" id="newTaskInput" placeholder="Ajouter une nouvelle tâche...">
                    <button class="btn-primary" id="addTaskBtn">Ajouter</button>
                </div>
            </form>

            <ul class="tasks-list" id="tasksList">
                <!-- Les tâches seront ajoutées ici dynamiquement -->
            </ul>

            <div class="empty-state" id="emptyState">
                <img src="/api/placeholder/120/120" alt="Liste vide">
                <h3>Aucune tâche pour le moment</h3>
                <p>Ajoutez votre première tâche pour commencer</p>
                <button class="btn-primary" id="emptyStateAddBtn">Ajouter une tâche</button>
            </div>
        </div>
    </div>

    <!-- Modal pour éditer/ajouter une tâche -->
    <div class="modal" id="taskModal">
        <div class="modal-content">
            <h2 id="modalTitle">Modifier la tâche</h2>
            <form id="taskForm">
                <input type="hidden" id="taskId">
                <div class="form-group">
                    <label for="taskTitle">Titre de la tâche</label>
                    <input type="text" id="taskTitle" required>
                </div>
                <div class="form-group">
                    <label for="taskStatus">Statut</label>
                    <select id="taskStatus">
                        <option value="pending">En attente</option>
                        <option value="in-progress">En cours</option>
                        <option value="completed">Terminé</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
