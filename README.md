# Main Courante – Application de gestion premium

## 🚀 Fonctionnalités principales
- Gestion des utilisateurs (rôles, permissions)
- Gestion des événements
- Gestion des shifts (services)
- Main courante avec timeline
- Dashboard admin premium
- Filtres avancés + recherche
- UI Tailwind moderne

## 🛠️ Technologies
- Laravel 12
- PHP 8.4
- TailwindCSS
- MySQL
- GitHub Actions

## 🧩 Installation
```bash
git clone https://github.com/ton-repo/main-courante.git
cd main-courante
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
