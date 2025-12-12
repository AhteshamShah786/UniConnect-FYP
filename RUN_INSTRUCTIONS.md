# 🚀 How to Run UniConnect Application

## Step-by-Step Instructions

### 1. Navigate to Project Directory
```bash
cd UniConnect
```

### 2. Install Dependencies (if not already done)
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Setup Environment
```bash
# Copy environment file (if .env doesn't exist)
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Run Database Migrations
```bash
php artisan migrate
```
This will create all database tables including the `is_admin` column.

### 5. Create Admin User
```bash
php artisan db:seed --class=AdminUserSeeder
```
This creates the admin user with:
- Email: `ghulammustafa.bscsf22@iba-suk.edu.pk`
- Password: `ghulam786@`

### 6. Build Frontend Assets
```bash
# For production
npm run build

# OR for development (with hot reload)
npm run dev
```

### 7. Start the Server
```bash
php artisan serve
```

The application will start at: **http://127.0.0.1:8000**

## 🔐 Access Points

### Public Website
- **URL**: http://127.0.0.1:8000
- **Features**: Home, Universities, Scholarships, Community, Profile

### Admin Panel
- **URL**: http://127.0.0.1:8000/admin/login
- **Email**: `ghulammustafa.bscsf22@iba-suk.edu.pk`
- **Password**: `ghulam786@`

## ⚡ Quick Commands Summary

```bash
# Complete setup (run these in order)
cd UniConnect
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
npm run build
php artisan serve
```

## 🛠️ Troubleshooting

### If migrations fail:
```bash
php artisan migrate:fresh
php artisan db:seed --class=AdminUserSeeder
```

### If assets don't load:
```bash
npm run build
```

### If you get permission errors:
```bash
# Windows (PowerShell as Administrator)
icacls storage /grant Users:F /T
icacls bootstrap\cache /grant Users:F /T
```

### Clear cache if needed:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

## 📝 Notes

- Keep the terminal open while `php artisan serve` is running
- For development, use `npm run dev` in a separate terminal for hot reload
- Admin user is created automatically via seeder
- All admin routes are protected - only admins can access

## ✅ Verification

After running, you should be able to:
1. ✅ Access the public website at http://127.0.0.1:8000
2. ✅ Login to admin panel at http://127.0.0.1:8000/admin/login
3. ✅ See the admin dashboard with statistics
4. ✅ Manage universities, scholarships, and posts

---

**That's it! Your application is ready to use.** 🎉

