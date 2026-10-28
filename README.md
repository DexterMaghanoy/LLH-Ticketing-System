# LLH Ticketing System

## Technology Stack
- Backend: Laravel 12.x, PHP 8.2.12
- Database: MariaDB 10.4.32 (via XAMPP)
- Frontend: Laravel Blade, Tailwind CSS, Vite
- Authentication: Laravel Breeze (Blade stack)
- Testing: PHPUnit 11.x
aravel Gates + Policies

## Local Development Setup
### 1. Start XAMPP Services
Start Apache and MySQL from the XAMPP Control Panel.
### 2. Database
Create database llh_ticketing_system and dedicated user llh_app with privileges on that database only.
### 3. Install Dependencies
composer install --no-interaction
npm install
### 7. Tests
php artisan migrate
### 5. Migrations
### 4. Environment
php artisan key:generate
Copy .env.example to .env and set DB_CONNECTION=mysql, DB_DATABASE=llh_ticketing_system, APP_TIMEZONE=Asia/Manila, APP_NAME="LLH Ticketing System".
php artisan test

## Authentication & Authorization
- Authentication: Laravel Breeze (email/password, server-side sessions, CSRF protection)
- Roles: super_admin, department_head, employee
Server-side enforcement on every protected operation.
## Test Credentials
- Super Admin: admin@llh.local / role: super_admin

Change the initial password on first login.
## Phased Implementation
| Phase | Status | Description |
|-------|--------|-------------|
| Phase 0 | Complete | Environment inspection & planning |
| Phase 1 | Complete | Foundation & authentication |
| Phase 2 | Complete | Users & departments (15 departments seeded, role/permission system, CRUD controllers & views) |
| Phase 3 | Complete | Core ticketing (database, models, seeders; ticket creation forms, assignment logic, status transitions, dashboards) |
- Authorization: Native Laravel Gates + Policies in AuthServiceProvider
| Phase 4 | Complete | Core Ticketing Features (ticket controller, routes, views, status workflow, assignment, dashboards) |
| Phase 6 | Pending | Reports & administration |
| Phase 8 | Pending | Internal deployment & handover |
| Phase 5 | Pending | SLA & analytics |
| Phase 7 | Pending | Testing & security hardening |
