@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>Info</h2>
        <div class="card todo-details">
            <div class="title">
                <h3>Titre</h3>
                <div class="title-container">
                    <form action="{{ route('todos.toggle.completed', $todo->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div onclick="this.closest('form').submit()"
                            class="task-checkbox {{ $todo->completed ? 'completed' : '' }}"></div>
                    </form>
                    <p>{{ $todo->title }}</p>
                </div>
            </div>
            <div class="description">
                <h3>Description</h3>
                <p>{{ $todo->description }}</p>
            </div>
            <div class="badge-container">
                <div class="category">
                    <h3>Catégorie</h3>
                    <span class="category-badge">{{ $todo->category->label ?? '' }}</span>
                </div>
                <div class="status">
                    <h3>Status</h3>
                    <span class="status-badge status-{{ $todo->completed ? 'completed' : 'in-progress' }}">
                        {{ $todo->completed ? 'Terminer' : 'En cours' }}</span>
                </div>
            </div>

            <div class="actions-container card">
                <a href="{{ route('todos.edit', $todo->id) }}">
                    <button class="btn-icon">✏️</button>
                </a>
                <a class="btn-icon" href="{{ route('todos.show', $todo->id) }}">👁️</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn-icon">🗑️</button>
                </form>
            </div>
        </div>
        <h2>Assigner une tache</h2>
        <div class="card">
            <form action="{{ route('todos.assign.to.people', $todo->id) }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="people">Utilisateur</label>
                    <select id="people" name="people[]" multiple>
                        <option value="" disabled {{ old('people', !empty($peopleAssignedIds)) ? '' : 'selected' }}>
                            Choisissez un utilisateur
                        </option>
                        @foreach ($people as $person)
                            <option value="{{ $person->id }}"
                                {{ in_array($person->id, old('people', null) ?? $peopleAssignedIds) ? 'selected' : '' }}>
                                {{ $person->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('people')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Assigner</button>
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                </div>
            </form>

        </div>
        <h2>Liste des personnes</h2>
        <div class="card">
            @if ($peopleAssigned->isEmpty())
                <div class="empty-state" id="emptyState">
                    {{-- <img src="/api/placeholder/120/120" alt="Liste vide"> --}}
                    <h3>Aucune personne pour le moment</h3>
                    <p>Ajoutez votre première personne pour commencer</p>
                    {{-- <button class="btn-primary" id="emptyStateAddBtn">Ajouter une personne</button> --}}
                </div>
            @else
                <form action="{{ route('todos.assign.to.people', $todo->id) }}" method="post" id="detachForm">
                    @csrf
                    <table>
                        <thead>
                            <th></th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date Nais.</th>
                            <th>Lieu Nais.</th>
                            <th>Genre</th>
                            <th>Assigner le </th>
                        </thead>
                        <tbody>
                            @foreach ($peopleAssigned as $person)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="people[]" id="" value="{{ $person->id }}"
                                            checked>
                                    </td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->birthdate->format('d-m-Y') }}</td>
                                    <td>{{ $person->birthplace }}</td>
                                    <td>{{ $person->gender }}</td>
                                    <td>{{ $person->todoAssigned->assigned_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date Nais.</th>
                            <th>Lieu Nais.</th>
                            <th>Genre</th>
                            <th>Assigner le </th>
                        </tfoot>
                    </table>
                </form>
                <div class="">
                    {{-- <form action="" method="post"> --}}
                    <button class="btn-primary" form="detachForm">Detacher</button>
                    {{-- </form> --}}
                </div>
            @endif
        </div>
    </div>
@endsection
