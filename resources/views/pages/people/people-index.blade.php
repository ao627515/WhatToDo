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
            <table>
                <thead>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date Nais.</th>
                    <th>Lieu Nais.</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ $person->birthdate->format('d-m-Y') }}</td>
                            <td>{{ $person->birthplace }}</td>
                            <td>{{ $person->gender }}</td>
                            <td>
                                <a href="{{ route('people.edit', $person->id) }}">
                                    <button class="btn-edit">Modifier</button>
                                </a>
                                <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete" type="submit">Supprimer</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date Nais.</th>
                    <th>Lieu Nais.</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tfoot>
            </table>
        @endif
    </div>
@endsection
