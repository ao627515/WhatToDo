{{-- Titre --}}
<div class="form-group">
    <label for="taskTitle">Titre de la tâche</label>
    <input type="text" id="taskTitle" name="title" value="{{ old('title', $todo?->title ?? '') }}" required>
</div>

{{-- Description --}}
<div class="form-group">
    <label for="taskDescription">Description de la tâche</label>
    <textarea id="taskDescription" name="description">{{ old('description', $todo?->description ?? '') }}</textarea>
</div>

{{-- Catégorie --}}
<div class="form-group">
    <label for="taskCategory">Catégorie de la tâche</label>
    <select id="taskCategory" name="category">
        <option value="" disabled {{ old('category', $todo?->category?->id ?? '') ? '' : 'selected' }}>
            Choisissez une catégorie
        </option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category', $todo?->category?->id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->label }}
            </option>
        @endforeach
    </select>
</div>

@if ($todo)
    {{-- Statut --}}
    <div class="form-group">
        <label for="taskStatus">Statut de la tâche</label>
        <select id="taskStatus" name="status">
            <option value="" disabled {{ old('status', $todo?->status ?? '') ? '' : 'selected' }}>
                Choisissez un statut
            </option>
            @foreach (['in-progress' => 'En cours', 'completed' => 'Terminé'] as $value => $label)
                <option value="{{ $value }}"
                    {{ old('status', $todo?->status ?? '') === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>
@endif

{{-- Dates --}}
<div class="form-group">
    <label for="taskStartDate">Date début</label>
    <input type="date" id="taskStartDate" name="start_date"
        value="{{ old('start_date', $todo?->start_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}">
</div>

<div class="form-group">
    <label for="taskEndDate">Date fin</label>
    <input type="date" id="taskEndDate" name="end_date"
        value="{{ old('end_date', $todo?->end_date?->format('Y-m-d') ?? now()->format('Y-m-d')) }}">
</div>

{{-- Actions --}}
<div class="form-actions">
    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
</div>
