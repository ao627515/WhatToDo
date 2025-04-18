@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 1rem">Modifier la personne</h2>

        <form id="taskForm" action="{{ route('people.update', $person->id) }}" method="post">
            @csrf
            @method('PUT')

            @include('pages.people.includes.people-form', [
                'person' => $person,
                'genders' => $genders,
            ])
        </form>
    </div>
@endsection
