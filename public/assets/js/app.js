// document.addEventListener('DOMContentLoaded', () => {
// Données de simulation pour le développement frontend

// Éléments DOM
const tasksList = document.getElementById('tasksList');
const emptyState = document.getElementById('emptyState');
const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const searchBtn = document.getElementById('searchBtn');
const newTaskInput = document.getElementById('newTaskInput');
// const addTaskBtn = document.getElementById('addTaskBtn');
const emptyStateAddBtn = document.getElementById('emptyStateAddBtn');
const taskModal = document.getElementById('taskModal');
const modalTitle = document.getElementById('modalTitle');
const taskForm = document.getElementById('taskForm');
const taskId = document.getElementById('taskId');
const taskTitle = document.getElementById('taskTitle');
const taskStatus = document.getElementById('taskStatus');
const cancelBtn = document.getElementById('cancelBtn');
const deleteForm = document.getElementById('deleteForm');
const modalFormActioninitValue = taskForm.action;

// Gestionnaires d'événements
searchBtn.addEventListener('click', filterTasks);
searchInput.addEventListener('input', filterTasks);
statusFilter.addEventListener('change', filterTasks);
// addTaskBtn.addEventListener('click', addTask);
emptyStateAddBtn?.addEventListener('click', openAddModal);
// newTaskInput.addEventListener('keypress', e => {
//     if (e.key === 'Enter') addTask();
// });

cancelBtn.addEventListener('click', closeModal);
// taskForm.addEventListener('submit', saveTask);

// Initialisation
// renderTasks();

// Fermer la modal si on clique à l'extérieur
window.addEventListener('click', e => {
    if (e.target === taskModal) {
        closeModal();
    }
});
// });

// Filtrer les tâches
function filterTasks() {
    const searchTerm = searchInput.value.toLowerCase();
    const statusValue = statusFilter.value;

    // const filteredTasks = tasks.filter(task => {
    //     const matchesSearch = task.title.toLowerCase().includes(searchTerm);
    //     const matchesStatus = statusValue === 'all' || task.status === statusValue;
    //     return matchesSearch && matchesStatus;
    // });

    // renderTasks(filteredTasks);
}


// Changer le statut d'une tâche (bascule terminé/non terminé)
function toggleTaskStatus(taskId) {
    //
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

    // Vérifier le statut à l'aide de classList.contains (fonctionne en natif, contrairement à hasClass)
    const statusBadge = target.querySelector('.status-badge');
    taskStatus.value = statusBadge && statusBadge.classList.contains('status-completed')
        ? 'completed'
        : 'in-progress';


    // Affichage des informations pour le debug (à retirer ou adapter en production)
    // console.log({ taskId, title, status });
    // console.log(taskId.value);
    taskForm.action = `${modalFormActioninitValue}/${taskId.value}`;

    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PUT';
    taskForm.appendChild(methodInput);

    // taskForm.submit();
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
        // tasks = tasks.filter(task => task.id !== taskId);
        // renderTasks();
        deleteForm.action = `${deleteForm.action}/${taskId}`;
        deleteForm.submit();
    }
}

