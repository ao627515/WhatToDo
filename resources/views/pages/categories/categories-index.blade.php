@extends('layouts.app')

@section('content')
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

        @if (true)
            <div class="empty-state" id="emptyState">
                {{-- <img src="/api/placeholder/120/120" alt="Liste vide"> --}}
                <h3>Aucune categorie pour le moment</h3>
                <p>Ajoutez votre première categorie pour commencer</p>
                {{-- <button class="btn-primary" id="emptyStateAddBtn">Ajouter une categorie</button> --}}
            </div>
        @else
            <ul class="categorys-list" id="categorysList">

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
                    <label for="categoryTitle">Titre de la categorie</label>
                    <input type="text" id="categoryTitle" name="title" required>
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
