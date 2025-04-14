@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 1rem">Créer une tâche</h2>

        <form id="taskForm" action="{{ route('todos.store') }}" method="post">
            @csrf

            @include('pages.todos.includes.todos-form', ['todo' => null])
        </form>
    </div>
@endsection
