
// Éléments DOM
const categoriesList = document.getElementById('categoriesList');
const emptyState = document.getElementById('emptyState');
const emptyStateAddBtn = document.getElementById('emptyStateAddBtn');
const categoryModal = document.getElementById('categoryModal');
const modalTitle = document.getElementById('modalTitle');
const categoryForm = document.getElementById('categoryForm');
const categoryId = document.getElementById('categoryId');
const categoryLabel = document.getElementById('categoryLabel');
const categoryDescription = document.getElementById('categoryDescription');
const cancelBtn = document.getElementById('cancelBtn');
const deleteForm = document.getElementById('deleteForm');
const toggleForm = document.getElementById('toggleForm');
const modalFormActioninitValue = categoryForm.action;
const signoutBtns = document.querySelectorAll('.signoutBtn');

// console.log(signoutBtns);


emptyStateAddBtn?.addEventListener('click', openAddModal);


cancelBtn.addEventListener('click', closeModal);

signoutBtns.forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        const route = btn.getAttribute('data-route');
        signout(route);
    });
});

// Fermer la modal si on clique à l'extérieur
window.addEventListener('click', e => {
    if (e.target === categoryModal) {
        closeModal();
    }
});


function signout(route) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = route;
    form.innerHTML = `
        <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
        `;
    // <input type="hidden" name="_method" value="DELETE">
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}



// Changer le statut d'une categorie (bascule terminé/non terminé)
function toggleTaskStatus(categoryId) {
    const action = toggleForm.action;
    toggleForm.action = action.replace(':id', categoryId);
    toggleForm.submit();
    toggleForm.action = action;
}

// Ouvrir la modal d'édition
function openEditModal(e) {
    // Définir le libelle du modal
    modalTitle.textContent = 'Modifier la categorie';

    // Trouver l'élément parent correspondant à une categorie
    const target = e.target.closest('.category-item');
    if (!target) {
        console.error("Aucun élément '.category-item' trouvé.");
        return;
    }

    // Extraire l'id de la categorie via l'attribut data-id
    categoryId.value = target.dataset.id;

    // Récupérer le libelle de la categorie avec vérification si l'élément existe
    const labelElement = target.querySelector('.category-text');
    categoryLabel.value = labelElement ? labelElement.textContent.trim() : '';

    categoryDescription.value = target.querySelector('.info-btn').title ?? '';

    categoryForm.action = `${modalFormActioninitValue}/${categoryId.value}`;

    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'PUT';
    categoryForm.appendChild(methodInput);

    // Activer l'affichage du modal
    categoryModal.classList.add('active');
}


// Ouvrir la modal d'ajout
function openAddModal() {
    modalTitle.textContent = 'Ajouter une categorie';
    categoryForm.reset();
    categoryId.value = '';

    categoryModal.classList.add('active');
}

// Fermer la modal
function closeModal() {
    categoryForm.action = modalFormActioninitValue;
    categoryForm.reset();
    categoryModal.classList.remove('active');
}


// Supprimer une categorie
function deleteTask(categoryId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette categorie?')) {
        deleteForm.action = `${deleteForm.action}/${categoryId}`;
        deleteForm.submit();
    }
}

