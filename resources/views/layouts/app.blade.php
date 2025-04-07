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
        @yield('content')
    </div>

    <!-- Modal pour éditer/ajouter une tâche -->
    {{-- <form  id="editForm"> --}}
    {{-- @method('PUT') --}}
    <div class="modal" id="taskModal">
        <div class="modal-content">
            <h2 id="modalTitle">Modifier la tâche</h2>
            <form id="taskForm" action="{{ route('todos.index') }}" method="post">
                @csrf
                <input type="hidden" id="taskId">
                <div class="form-group">
                    <label for="taskTitle">Titre de la tâche</label>
                    <input type="text" id="taskTitle" name="title" required>
                </div>
                {{-- <div class="form-group">
                    <label for="taskStatus">Statut</label>
                    <select id="taskStatus" name="status">
                        <option value="in-progress">En cours</option>
                        <option value="completed">Terminé</option>
                    </select>
                </div> --}}
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    {{-- </form> --}}

    <form action="{{ route('todos.index') }}" method="post" delete id="deleteForm" style="display: none;">
        @csrf
        @method('DELETE')
    </form>


    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
