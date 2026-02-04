# Projet AlterTrack - Guide de Test

Bonjour, ce guide rapide vous explique comment lancer et tester l'application de suivi d'alternances.

## 1. Fichiers de Données pour le Test

Pour tester rapidement l'application, des fichiers de données sont fournis dans le dossier `/lib`.

*   `lib/donnees-test-entreprises.csv`
*   `lib/donnees-test-alternances.csv`

**Action requise :** L'application importe les fichiers au format **Excel (`.xlsx`)**. Vous devez donc ouvrir chaque fichier `.csv` avec un tableur (Excel, LibreOffice) et l'enregistrer au format `.xlsx`.

Une fois les fichiers convertis, vous pourrez les importer depuis le tableau de bord de l'application pour peupler la base de données.

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

Vous pouvez ensuite vous créer un compte pour accéder au tableau de bord et tester les fonctionnalités d'import et de filtrage.
