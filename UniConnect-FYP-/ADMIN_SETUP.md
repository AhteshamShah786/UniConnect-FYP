# UniConnect Admin Panel Setup Guide

## Overview
This guide will help you set up and run the UniConnect application with the admin panel functionality.

## Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or MySQL/PostgreSQL)

## Installation Steps

### 1. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 2. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Database Setup
```bash
# Run migrations
php artisan migrate

# Seed admin user
php artisan db:seed --class=AdminUserSeeder
```

### 4. Build Assets
```bash
# Build frontend assets
npm run build

# Or run in development mode
npm run dev
```

### 5. Start the Server
```bash
# Start Laravel development server
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

## Admin Panel Access

### Admin Login Credentials
- **URL**: `http://127.0.0.1:8000/admin/login`
- **Email**: `ghulammustafa.bscsf22@iba-suk.edu.pk`
- **Password**: `ghulam786@`

### Admin Routes
- Dashboard: `/admin/dashboard`
- Universities: `/admin/universities`
- Scholarships: `/admin/scholarships`
- Posts: `/admin/posts`

## Features Implemented

### ✅ Admin Panel
- Admin authentication system
- Admin middleware for route protection
- Admin dashboard with statistics
- CRUD operations for:
  - Universities
  - Scholarships
  - Community Posts

### ✅ Improved Validation
- Enhanced form validation with custom error messages
- Better error handling in all controllers
- User-friendly error display

### ✅ UI Enhancements
- Modern logo design
- Light theme with attractive color palette
- Responsive design
- Clean navigation

### ✅ Code Quality
- Proper code comments
- Clean code structure
- Separated components, routes, controllers, and models

## Admin Panel Features

### Dashboard
- Statistics overview (Universities, Scholarships, Posts, Users)
- Recent items display
- Quick navigation

### Universities Management
- Create, Read, Update, Delete universities
- Comprehensive validation
- Active/Inactive status management

### Scholarships Management
- Create, Read, Update, Delete scholarships
- Link to universities
- Deadline management
- Eligibility criteria management

### Posts Management
- View all community posts
- Feature/Unfeature posts
- Pin/Unpin posts
- Delete posts

## Troubleshooting

### Migration Issues
If you encounter migration errors:
```bash
php artisan migrate:fresh
php artisan db:seed --class=AdminUserSeeder
```

### Admin User Not Created
If admin user doesn't exist:
```bash
php artisan db:seed --class=AdminUserSeeder
```

### Permission Errors
Ensure storage and cache directories are writable:
```bash
chmod -R 775 storage bootstrap/cache
```

## Development

### Running Tests
```bash
php artisan test
```

### Clearing Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## Notes

- All admin routes are protected by the `admin` middleware
- Only users with `is_admin = true` can access admin panel
- Admin user is automatically created via seeder
- All forms have improved validation and error handling

