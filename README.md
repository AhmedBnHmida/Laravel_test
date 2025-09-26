# 🏠 InnovQube - Système de Gestion de Réservations Immobilières

## 📋 Description du Projet

Application web développée avec **Laravel** pour la gestion de réservations immobilières. Cette plateforme permet aux utilisateurs de découvrir des propriétés disponibles et de faire des réservations, tandis que les administrateurs peuvent gérer l'ensemble du contenu via une interface dédiée.

**Projet développé dans le cadre d'un test technique pour InnovQube.**

## 🎯 Fonctionnalités Implémentées

### 👥 Espace Utilisateur
- **Landing page split-screen** - Navigation intuitive Admin/User
- **Consultation des propriétés** - Grid responsive avec cartes
- **Pages de détails** - Informations complètes avec système de réservation
- **Design responsive** - Compatible mobile, tablette et desktop

### 🔐 Espace Administration
- **Panel Filament** - Interface d'administration moderne
- **Gestion des propriétés** - CRUD complet
- **Gestion des réservations** - Suivi des bookings
- **Interface intuitive** - Gestion facile du contenu

### ⚡ Technologies Modernes
- **Composants Livewire** - Interactivité en temps réel
- **TailwindCSS** - Design system utilitaire
- **Système de réservation** - Dates et disponibilités

## 🛠️ Stack Technique

### Backend
- **Laravel 10.x** - Framework PHP moderne
- **MySQL** - Base de données relationnelle
- **Eloquent ORM** - Gestion objet-relationnelle

### Frontend
- **TailwindCSS** - Framework CSS utilitaire
- **Livewire** - Composants dynamiques full-stack
- **Alpine.js** - Interactivité légère
- **Vite** - Build tool ultra-rapide

### Administration
- **Filament** - Panel admin moderne et intuitif

## 📦 Installation et Démarrage

### Prérequis
- PHP 8.1 ou supérieur
- Composer 2.x
- MySQL 5.7+
- Node.js 16+ et NPM

### 🚀 Installation Rapide

1. **Cloner et configurer**
```bash
git clone [repository-url]
cd laravel-test
composer install
npm install
cp .env.example .env
php artisan key:generate
Configuration base de données
```

2. **Configuration base de données**

**Créer la base de données MySQL**
```bash
mysql -u root -p -e "CREATE DATABASE laravel_test;"
```

**Configurer .env**

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=
```
3. **Migration et données de test**

```bash
php artisan migrate --seed
```

4. **Build des assets**

```bash
npm run build
# Ou pour le développement
npm run dev
```

5. **Lancer l'application**

```bash
php artisan serve
```


## 🌐 Accès à l'Application
### URLs principales

- **Landing Page** : http://localhost:8000/

- **Espace Utilisateur** : http://localhost:8000/user

- **Administration** : http://localhost:8000/admin

- **API Properties** : http://localhost:8000/properties

### Comptes de test

Après exécution des seeders :

- **Admin** : admin@innovqube.com / password

- **Utilisateur standard** : Peut s'inscrire via le formulaire

## 🏗️ Architecture du Projet

```bash
laravel-test/
├── app/
│   ├── Models/
│   │   ├── Property.php          # Modèle propriété
│   │   └── Booking.php           # Modèle réservation
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PropertyController.php
│   │   └── Livewire/
│   │       └── BookingManager.php # Composant réservation
│   └── Filament/
│       └── Resources/            # Resources admin
├── database/
│   ├── migrations/               # Schéma base de données
│   └── seeders/                  # Données de test
├── resources/
│   ├── views/
│   │   ├── layouts/              # Layouts Blade
│   │   ├── properties/           # Vues propriétés
│   │   └── livewire/             # Vues Livewire
│   └── css/                      # Styles Tailwind
└── routes/
    └── web.php                   # Routes de l'application
```

## 📊 Modèles de Données
### Property (Propriété)

```php
- id (Primary Key)
- name (string)           # Nom de la propriété
- description (text)      # Description détaillée
- price_per_night (decimal) # Prix par nuit
- timestamps
```
### Booking (Réservation)*

```php
- id (Primary Key)
- user_id (Foreign Key)   # Référence à l'utilisateur
- property_id (Foreign Key) # Référence à la propriété
- start_date (date)       # Date de début
- end_date (date)         # Date de fin
- total_price (decimal)   # Prix total du séjour
- status (string)         # Statut de la réservation
- timestamps
```

### Relations

- **User** has many **Bookings**

- **Property** has many **Bookings**

- **Booking** belongs to **User and Property**

## 🎨 Personnalisation
### Palette de couleurs

Le projet utilise une palette personnalisée définie dans **tailwind.config.js** :

```bash
colors: {
    primary: '#1E40AF',    // Bleu InnovQube
    secondary: '#9333EA',  // Violet InnovQube
}
```

### Composants Livewire

**BookingManager** - Gère l'affichage et l'interaction des propriétés :

- Liste des propriétés

- Modal de réservation

- Calcul des prix en temps réel

## 🚀 Déploiement en Production
### Préparation

```bash
# Optimisation pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build des assets
npm run build
```

### Variables d'environnement critiques

```bash
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_base_production
DB_USERNAME=utilisateur_production
DB_PASSWORD=mot_de_passe_production
```

## 🧪 Tests et Qualité
### Exécution des tests

```bash
# Tests PHPUnit
php artisan test

# Analyse statique Laravel Pint
./vendor/bin/pint

# Vérification des standards de code
./vendor/bin/pint --test
```

###  Données de test

Le seeder inclut 5 propriétés de démonstration :

1. Villa Moderne avec Piscine (350€/nuit)

2. Appartement Cosy Centre-ville (120€/nuit)

3. Chalet Traditionnel en Montagne (280€/nuit)

4. Studio Vue sur Mer (90€/nuit)

5. Maison de Campagne Authentique (180€/nuit)

## 🔧 Dépannage
### Problèmes courants

**Erreurs de permissions**

```bash
chmod -R 755 storage bootstrap/cache
chown -R $USER:www-data storage bootstrap/cache
```

**Problèmes de cache**

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

**Problèmes NPM/Vite**

```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

**Problèmes de base de données**

```bash
php artisan migrate:fresh --seed
php artisan db:seed --class=PropertySeeder
```

## 📝 Journal de Développement
### Commit 1 : Initialisation

- Configuration Laravel avec Breeze

- Système d'authentification

### Commit 2 : Modèles et Migrations

- Création des models Property et Booking

- Relations Eloquent et schéma de base

### Commit 3 : Interface Utilisateur

- Layout principal avec TailwindCSS

- Composants Blade réutilisables

- Design system cohérent

### Commit 4 : Composants Dynamiques

- Intégration de Livewire

- Composant BookingManager interactif

### Commit 5 : Administration

- Panel Filament pour la gestion

- CRUD complet des propriétés

### Commit 6 : Expérience Utilisateur

- Landing page split-screen

- Pages de détails enrichies

- Système de réservation

## 🤝 Guide de Contribution

1. Fork le repository

2. Feature branch : ```bash git checkout -b feature/nouvelle-fonctionnalite ```

3. Commit : ```bash git commit -m 'Ajout nouvelle fonctionnalité' ```

4. Push : ```bash git push origin feature/nouvelle-fonctionnalite ```

5. Pull Request

## 📞 Support

Pour toute question concernant ce projet :

- Email : rh@innovqube.com

- Documentation : [Lien vers la documentation technique]

## 📄 Licence

Ce projet a été développé dans le cadre d'un processus de recrutement avec InnovQube. Le code est fourni à titre démonstratif.

Développé avec ❤️ en utilisant l'écosystème Laravel

"Where technology meets hospitality" - InnovQube
