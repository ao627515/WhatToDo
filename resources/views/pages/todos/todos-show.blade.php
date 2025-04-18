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
    </div>
@endsection
