@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="card">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">

        {{-- <form action="{{ route('categories.index') }}" method="get" id="searchForm">
            @csrf
            <div class="">
                <input type="text" id="searchInput" name="query" value="" placeholder="Rechercher une categorie...">
                <button class="btn-secondary" id="searchBtn">Rechercher</button>
                <button type="reset" class="btn-secondary" id="resetBtn">Reenitialise</button>
            </div>
        </form> --}}


        <div class="add-category">
            <button class="btn-primary" id="emptyStateAddBtn">Ajouter une categorie</button>
        </div>

        @if ($categories->isEmpty())
            <div class="empty-state" id="emptyState">
                {{-- <img src="/api/placeholder/120/120" alt="Liste vide"> --}}
                <h3>Aucune categorie pour le moment</h3>
                <p>Ajoutez votre première categorie pour commencer</p>
                {{-- <button class="btn-primary" id="emptyStateAddBtn">Ajouter une categorie</button> --}}
            </div>
        @else
            <ul class="categories-list" id="categoriesList">
                @foreach ($categories as $categorie)
                    <li class="category-item" data-id="{{ $categorie->id }}">
                        <div class="category-text">
                            {{ $categorie->label }}
                        </div>
                        <div class="item-actions">
                            <button class="btn-icon edit-btn" onclick="openEditModal(event)">✏️</button>
                            <button class="btn-icon delete-btn" onclick="deleteTask({{ $categorie->id }})">🗑️</button>
                            <button class="btn-icon info-btn" title="{{ $categorie->description }}">ℹ️</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="modal" id="categoryModal">
        <div class="modal-content">
            <h2 id="modalTitle">Modifier la categorie</h2>
            <form id="categoryForm" action="{{ route('categories.index') }}" method="post">
                @csrf
                <input type="hidden" id="categoryId">
                <div class="form-group">
                    <label for="categoryLabel">Libelle de la categorie</label>
                    <input type="text" id="categoryLabel" name="label" required>
                </div>
                <div class="form-group">
                    <label for="categoryDescription">Description de la categorie</label>
                    <textarea type="text" id="categoryDescription" name="description"></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
                    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ route('categories.index') }}" method="post" delete id="deleteForm" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/categories.js') }}"></script>
@endsection
