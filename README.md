# WhatToDo

WhatToDo est une application de gestion de tâches et d'organisation personnelle développée avec le framework Laravel. Elle permet aux utilisateurs de gérer leurs tâches, catégories, et personnes associées de manière intuitive.

## Fonctionnalités

-   **Gestion des tâches** : Créez, modifiez, supprimez et marquez les tâches comme terminées.
-   **Catégories** : Organisez vos tâches en catégories personnalisées.
-   **Personnes** : Associez des tâches à des personnes pour une meilleure collaboration.
-   **Authentification** : Inscription, connexion et déconnexion sécurisées.
-   **Interface utilisateur intuitive** : Une interface simple et responsive pour une meilleure expérience utilisateur.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

-   PHP >= 8.2
-   Composer
<!-- -   Node.js et npm -->
-   MySQL ou SQLite (ou tout autre base de données compatible avec Laravel)

## Installation

1. Clonez le dépôt :

    ```bash
    git clone https://github.com/ao627515/WhatToDo.git
    cd WhatToDo
    ```

2. Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```

3. Installez les dépendances JavaScript avec npm :

    ```bash
    npm install
    ```

4. Configurez votre fichier `.env` :

    - Copiez le fichier `.env.example` :
        ```bash
        cp .env.example .env
        ```
    - Configurez les variables d'environnement, notamment la connexion à la base de données.

5. Générez la clé de l'application :

    ```bash
    php artisan key:generate
    ```

6. Exécutez les migrations et les seeders :

    ```bash
    php artisan migrate --seed
    ```

<!-- 7. Compilez les assets front-end :

    ```bash
    npm run dev
    ``` -->

7. Lancez le serveur de développement :

    ```bash
    php artisan serve
    ```

    L'application sera accessible à l'adresse [http://localhost:8000](http://localhost:8000).

## Utilisation

-   Accédez à l'application via votre navigateur.
-   Inscrivez-vous ou connectez-vous pour commencer à gérer vos tâches.
-   Naviguez entre les tâches, catégories et personnes via le menu.

## Structure du projet

-   **Routes** : Les routes sont définies dans web.php.
-   **Contrôleurs** : Les contrôleurs se trouvent dans Controllers.
-   **Vues** : Les fichiers Blade sont situés dans views.
-   **Services** : La logique métier est implémentée dans Services.

## Contribution

Les contributions sont les bienvenues ! Si vous souhaitez contribuer :

1. Forkez le projet.
2. Créez une branche pour votre fonctionnalité ou correction de bug (`git checkout -b feature/ma-fonctionnalite`).
3. Faites vos modifications et validez-les (`git commit -m "Ajout de ma fonctionnalité"`).
4. Poussez vos modifications (`git push origin feature/ma-fonctionnalite`).
5. Ouvrez une Pull Request.

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT). Vous êtes libre de l'utiliser, de le modifier et de le distribuer.

---

Merci d'utiliser WhatToDo ! 🎉
