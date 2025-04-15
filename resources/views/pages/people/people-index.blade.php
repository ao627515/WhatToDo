@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="add-person">
            <a href="{{ route('people.create') }}">
                <button class="btn-primary" id="emptyStateAddBtn">Ajouter une personne</button>
            </a>
        </div>

        @if ($people->isEmpty())
            <div class="empty-state" id="emptyState">
                {{-- <img src="/api/placeholder/120/120" alt="Liste vide"> --}}
                <h3>Aucune personne pour le moment</h3>
                <p>Ajoutez votre première personne pour commencer</p>
                {{-- <button class="btn-primary" id="emptyStateAddBtn">Ajouter une personne</button> --}}
            </div>
        @else
            <ul class="people-list" id="peopleList">
                @foreach ($people as $person)
                    <p>yo</p>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
