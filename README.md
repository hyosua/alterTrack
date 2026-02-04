# Projet AlterTrack - Guide de Test

Bonjour, ce guide rapide vous explique comment lancer et tester l'application de suivi d'alternances.

## 1. Fichiers de Données pour le Test

Pour tester rapidement l'application, des fichiers de données sont fournis dans le dossier `/lib`.

*   `lib/donnees-test-entreprises.xslx`
*   `lib/donnees-test-alternances.xslx`


## 2. Installation du Projet

Assurez-vous d'avoir PHP, Composer, et Node.js installés sur votre machine.

1.  **Configuration de l'environnement**
    ```bash
    cp .env.example .env
    ```
    Le projet est configuré par défaut pour utiliser SQLite. Aucune autre configuration de base de données n'est nécessaire si vous gardez ce paramètre.

2.  **Installation des dépendances**
    ```bash
    composer install
    npm install
    npm run build
    ```

3.  **Finalisation de l'installation**
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

## 3. Lancement de l'Application

Pour démarrer le serveur de développement local :

```bash
php artisan serve
```

L'application sera accessible à l'adresse `http://127.0.0.1:8000`.

Vous pouvez ensuite vous **créer un compte** pour accéder au tableau de bord et tester les fonctionnalités d'**import et de filtrage**.

## 4. Nouveautés de la Version 2

Cette mise à jour apporte des améliorations significatives à l'expérience utilisateur et à la fonctionnalité de l'application :

### 4.1 Personnalisation de l'Interface

*   **Page d'authentification :** La page de connexion a été personnalisée pour mieux correspondre à l'identité visuelle du projet "AlterTrack", avec un logo textuel et un style épuré.
*   **Page d'accueil (`/`) :** Entièrement repensée pour une présentation plus moderne. Elle affiche désormais un titre "AlterTrack" proéminent, un message de bienvenue, une image "Hero" stylisée et des boutons d'action clairs pour la connexion et l'inscription. Pour les utilisateurs déjà connectés, un lien direct vers le tableau de bord est accessible.

### 4.2 Améliorations des Filtres du Tableau de Bord

*   **Filtre par Type (Stage/Alternance) :** Le filtre a été renforcé pour être insensible à la casse, permettant de trouver les "Alternance" ou "Stage" quelle que soit leur écriture en base de données.
*   **Champs "Entreprise" et "Technos" :** Les champs de filtre sont désormais des "selects" interactifs avec fonction de recherche (autocomplétion). Cela permet une sélection plus rapide et plus précise des entreprises et des technologies disponibles.

### 4.3 Amélioration du Lancement Docker

*   Lors de l'utilisation de `docker compose up`, l'URL d'accès à l'application (`http://localhost:8000`) est maintenant affichée directement dans la console pour faciliter l'accès.
