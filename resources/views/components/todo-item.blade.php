<li class="task-item" data-id="{{ $todo->id }}">
    <div class="task-content">
        <div class="task-checkbox {{ $todo->completed ? 'completed' : '' }}"></div>
        <span class="task-text {{ $todo->completed ? 'completed' : '' }}">{{ $todo->title }}</span>
        <span
            class="status-badge status-{{ $todo->completed ? 'completed' : 'in-progress' }}">{{ $todo->completed ? 'Terminer' : 'En cours' }}</span>
    </div>
    <div class="task-actions">
        <button class="btn-icon edit-btn">✏️</button>
        <button class="btn-icon delete-btn" onclick="deleteTask({{ $todo->id }})">🗑️</button>
    </div>
</li>
