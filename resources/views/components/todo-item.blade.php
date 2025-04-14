<li class="task-item" data-id="{{ $todo->id }}" data-category="{{ $todo->category->id }}"
    data-status="{{ $todo->status }}">
    <div class="task-content">
        <div class="task-checkbox {{ $todo->completed ? 'completed' : '' }}"
            onclick="toggleTaskStatus({{ $todo->id }})"></div>
        <span class="task-text {{ $todo->completed ? 'completed' : '' }}">{{ $todo->title }}</span>
        <span
            class="status-badge status-{{ $todo->completed ? 'completed' : 'in-progress' }}">{{ $todo->completed ? 'Terminer' : 'En cours' }}</span>
        <span class="category-badge">{{ $todo->category->label ?? '' }}</span>
    </div>
    <div class="task-actions">
        <a href="{{ route('todos.edit', $todo->id) }}">
            <button class="btn-icon edit-btn">✏️</button>
        </a>
        <button class="btn-icon delete-btn" onclick="deleteTask({{ $todo->id }})">🗑️</button>
        <button class="btn-icon info-btn" title="{{ $todo->description }}">ℹ️</button>
    </div>
</li>
