
document.addEventListener('DOMContentLoaded', () => {
    // Données de simulation pour le développement frontend
    let tasks = [{
        id: 1,
        title: "Finaliser la conception de la base de données",
        status: "completed"
    },
    {
        id: 2,
        title: "Créer les migrations Laravel",
        status: "in-progress"
    },
    {
        id: 3,
        title: "Implémenter les contrôleurs",
        status: "pending"
    },
    {
        id: 4,
        title: "Écrire les tests unitaires",
        status: "pending"
    }
    ];

    // Éléments DOM
    const tasksList = document.getElementById('tasksList');
    const emptyState = document.getElementById('emptyState');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const searchBtn = document.getElementById('searchBtn');
    const newTaskInput = document.getElementById('newTaskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const emptyStateAddBtn = document.getElementById('emptyStateAddBtn');
    const taskModal = document.getElementById('taskModal');
    const modalTitle = document.getElementById('modalTitle');
    const taskForm = document.getElementById('taskForm');
    const taskId = document.getElementById('taskId');
    const taskTitle = document.getElementById('taskTitle');
    const taskStatus = document.getElementById('taskStatus');
    const cancelBtn = document.getElementById('cancelBtn');

    // Afficher les tâches
    function renderTasks(tasksToRender = tasks) {
        tasksList.innerHTML = '';

        if (tasksToRender.length === 0) {
            tasksList.style.display = 'none';
            emptyState.style.display = 'block';
            return;
        }

        tasksList.style.display = 'block';
        emptyState.style.display = 'none';

        tasksToRender.forEach(task => {
            const li = document.createElement('li');
            li.className = 'task-item';
            li.dataset.id = task.id;

            const statusBadgeClass = `status-${task.status}`;
            const statusText = task.status === 'pending' ? 'En attente' :
                task.status === 'in-progress' ? 'En cours' : 'Terminé';

            li.innerHTML = `
    <div class="task-content">
        <div class="task-checkbox ${task.status === 'completed' ? 'completed' : ''}"></div>
        <span class="task-text ${task.status === 'completed' ? 'completed' : ''}">${task.title}</span>
        <span class="status-badge ${statusBadgeClass}">${statusText}</span>
    </div>
    <div class="task-actions">
        <button class="btn-icon edit-btn">✏️</button>
        <button class="btn-icon delete-btn">🗑️</button>
    </div>
    `;

            tasksList.appendChild(li);

            // Ajouter des gestionnaires d'événements
            const checkbox = li.querySelector('.task-checkbox');
            checkbox.addEventListener('click', () => toggleTaskStatus(task.id));

            const editBtn = li.querySelector('.edit-btn');
            editBtn.addEventListener('click', () => openEditModal(task));

            const deleteBtn = li.querySelector('.delete-btn');
            deleteBtn.addEventListener('click', () => deleteTask(task.id));
        });
    }

    // Filtrer les tâches
    function filterTasks() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value;

        const filteredTasks = tasks.filter(task => {
            const matchesSearch = task.title.toLowerCase().includes(searchTerm);
            const matchesStatus = statusValue === 'all' || task.status === statusValue;
            return matchesSearch && matchesStatus;
        });

        renderTasks(filteredTasks);
    }

    // Ajouter une nouvelle tâche
    function addTask() {
        const title = newTaskInput.value.trim();
        if (!title) return;

        const newTask = {
            id: Date.now(),
            title: title,
            status: 'pending'
        };

        tasks.push(newTask);
        newTaskInput.value = '';
        renderTasks();
    }

    // Changer le statut d'une tâche (bascule terminé/non terminé)
    function toggleTaskStatus(taskId) {
        const task = tasks.find(t => t.id === taskId);
        if (task) {
            task.status = task.status === 'completed' ? 'pending' : 'completed';
            renderTasks();
        }
    }

    // Ouvrir la modal d'édition
    function openEditModal(task) {
        modalTitle.textContent = 'Modifier la tâche';
        taskId.value = task.id;
        taskTitle.value = task.title;
        taskStatus.value = task.status;

        taskModal.classList.add('active');
    }

    // Ouvrir la modal d'ajout
    function openAddModal() {
        modalTitle.textContent = 'Ajouter une tâche';
        taskForm.reset();
        taskId.value = '';

        taskModal.classList.add('active');
    }

    // Fermer la modal
    function closeModal() {
        taskModal.classList.remove('active');
    }

    // Sauvegarder les modifications de tâche
    function saveTask(e) {
        e.preventDefault();

        const id = taskId.value;
        const title = taskTitle.value.trim();
        const status = taskStatus.value;

        if (!title) return;

        if (id) {
            // Modifier une tâche existante
            const taskIndex = tasks.findIndex(t => t.id == id);
            if (taskIndex !== -1) {
                tasks[taskIndex].title = title;
                tasks[taskIndex].status = status;
            }
        } else {
            // Ajouter une nouvelle tâche
            const newTask = {
                id: Date.now(),
                title: title,
                status: status
            };
            tasks.push(newTask);
        }

        closeModal();
        renderTasks();
    }

    // Supprimer une tâche
    function deleteTask(taskId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche?')) {
            tasks = tasks.filter(task => task.id !== taskId);
            renderTasks();
        }
    }

    // Gestionnaires d'événements
    searchBtn.addEventListener('click', filterTasks);
    searchInput.addEventListener('input', filterTasks);
    statusFilter.addEventListener('change', filterTasks);
    addTaskBtn.addEventListener('click', addTask);
    emptyStateAddBtn.addEventListener('click', openAddModal);
    newTaskInput.addEventListener('keypress', e => {
        if (e.key === 'Enter') addTask();
    });

    cancelBtn.addEventListener('click', closeModal);
    taskForm.addEventListener('submit', saveTask);

    // Initialisation
    renderTasks();

    // Fermer la modal si on clique à l'extérieur
    window.addEventListener('click', e => {
        if (e.target === taskModal) {
            closeModal();
        }
    });
});
