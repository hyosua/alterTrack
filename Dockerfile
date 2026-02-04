FROM php:8.3-fpm

# Installation des dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    zip \
    unzip

# Nettoyage du cache apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP (On ajoute pdo_sqlite et sqlite3)
RUN docker-php-ext-install pdo_sqlite bcmath gd mbstring pcntl exif