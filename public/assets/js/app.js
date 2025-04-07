
// Éléments DOM
const tasksList = document.getElementById('tasksList');
const emptyState = document.getElementById('emptyState');
const emptyStateAddBtn = document.getElementById('emptyStateAddBtn');
const taskModal = document.getElementById('taskModal');
const modalTitle = document.getElementById('modalTitle');
const taskForm = document.getElementById('taskForm');
const taskId = document.getElementById('taskId');
const taskTitle = document.getElementById('taskTitle');
const cancelBtn = document.getElementById('cancelBtn');
const deleteForm = document.getElementById('deleteForm');
const toggleForm = document.getElementById('toggleForm');
const modalFormActioninitValue = taskForm.action;

emptyStateAddBtn?.addEventListener('click', openAddModal);


cancelBtn.addEventListener('click', closeModal);

// Fermer la modal si on clique à l'extérieur
window.addEventListener('click', e => {
    if (e.target === taskModal) {
        closeModal();
    }
});



// Changer le statut d'une tâche (bascule terminé/non terminé)
function toggleTaskStatus(taskId) {
    const action = toggleForm.action;
    toggleForm.action = action.replace(':id', taskId);
    toggleForm.submit();
    toggleForm.action = action;
}

// Ouvrir la modal d'édition
function openEditModal(e) {
    // Définir le titre du modal
    modalTitle.textContent = 'Modifier la tâche';

    // Trouver l'élément parent correspondant à une tâche
    const target = e.target.closest('.task-item');
    if (!target) {
        console.error("Aucun élément '.task-item' trouvé.");
        return;
    }

    // Extraire l'id de la tâche via l'attribut data-id
    taskId.value = target.dataset.id;

    // Récupérer le titre de la tâche avec vérification si l'élément existe
    const titleElement = target.querySelector('.task-text');
    taskTitle.value = titleElement ? titleElement.textContent : '';

    taskForm.action = `${modalFormActioninitValue}/${taskId.value}`;

    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PUT';
    taskForm.appendChild(methodInput);

    // Activer l'affichage du modal
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
    taskForm.action = modalFormActioninitValue;
    taskForm.reset();
    taskModal.classList.remove('active');
}


// Supprimer une tâche
function deleteTask(taskId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette tâche?')) {
        deleteForm.action = `${deleteForm.action}/${taskId}`;
        deleteForm.submit();
    }
}

