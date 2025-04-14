@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 1rem">Modifier la tâche</h2>

        <form id="taskForm" action="{{ route('todos.update', $todo->id) }}" method="post">
            @csrf
            @method('PUT')

            @include('pages.todos.includes.todos-form', ['todo' => $todo])
        </form>
    </div>
@endsection
