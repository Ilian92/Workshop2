# APWAP - Bien-être et Produits pour Animaux

Une plateforme e-commerce moderne dédiée au bien-être et aux produits pour animaux de compagnie, construite avec Laravel.


## À Propos

APWAP est une plateforme e-commerce complète de soins pour animaux de compagnie qui permet aux utilisateurs de :
- Parcourir et acheter des produits pour animaux
- Gérer les profils de leurs animaux de compagnie
- Suivre les commandes et l'historique d'achat
- Obtenir des recommandations de produits personnalisées basées sur leurs animaux

La plateforme comprend à la fois une interface client et un panneau d'administration pour une gestion complète de la boutique.


## Technologies

### Backend
- **Laravel 12.x** - Framework PHP pour applications web
- **MySQL** - Système de gestion de base de données relationnelle
- **Laravel Sail** - Environnement de développement local alimenté par Docker

### Frontend
- **Tailwind CSS** - Framework CSS utility-first
- **Vite** - Outil de build rapide et serveur de développement


## Installation

### 1. Cloner le Dépôt
```bash
git clone https://github.com/Ilian92/Workshop2
cd Workshop2
```

### 2. Installer les Dépendances PHP
```bash
composer install
```

### 3. Installer les Dépendances Node.js
```bash
npm install
```

### 4. Configuration de l'Environnement
```bash
cp .env.example .env

./vendor/bin/sail artisan key:generate
```

### 5. Configurer les Variables d'Environnement
Modifiez le fichier `.env` avec vos identifiants de base de données :
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=sail
DB_PASSWORD=password
```

### 6. Démarrer l'Application
```bash
./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate:fresh --seed

npm run dev
```

## Utilisation

### Accéder à l'Application
- **Frontend** : http://localhost:8000

### Comptes par Défaut
Après avoir exécuté les seeders, vous pouvez utiliser ces comptes :
- **Admin** : admin@admin.com / 12345678
- **Utilisateur** : test@example.com / password

### Commandes de Développement

#### Commandes Laravel Sail
```bash
# Démarrer les conteneurs
./vendor/bin/sail up -d

# Arrêter les conteneurs
./vendor/bin/sail down
```

#### Développement Frontend
```bash
# Serveur de développement (rechargement à chaud)
npm run dev

# Construction pour la production
npm run build

# Surveiller les changements
npm run watch
```

## Contributeurs
- Noah OEU (https://github.com/SenkaX)
- Ilian IGOUDJIL (https://github.com/Ilian92)
- Morgane DASSONVILLE (https://github.com/Jun080)
