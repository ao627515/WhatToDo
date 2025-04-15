@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 1rem">Créer une personne</h2>

        <form id="personForm" action="{{ route('people.store') }}" method="post">
            @csrf

            @include('pages.people.includes.people-form', [
                'person' => null,
                'genders' => $genders,
            ])
        </form>
    </div>
@endsection
