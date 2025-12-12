@echo off
echo ========================================
echo   UniConnect - Starting Application
echo ========================================
echo.

echo [1/7] Installing PHP dependencies...
call composer install
if errorlevel 1 (
    echo ERROR: Composer install failed!
    pause
    exit /b 1
)

echo.
echo [2/7] Installing Node dependencies...
call npm install
if errorlevel 1 (
    echo ERROR: npm install failed!
    pause
    exit /b 1
)

echo.
echo [3/7] Generating application key...
call php artisan key:generate
if errorlevel 1 (
    echo ERROR: Key generation failed!
    pause
    exit /b 1
)

echo.
echo [4/7] Running database migrations...
call php artisan migrate
if errorlevel 1 (
    echo ERROR: Migration failed!
    pause
    exit /b 1
)

echo.
echo [5/7] Creating admin user...
call php artisan db:seed --class=AdminUserSeeder
if errorlevel 1 (
    echo ERROR: Seeding failed!
    pause
    exit /b 1
)

echo.
echo [6/7] Building frontend assets...
call npm run build
if errorlevel 1 (
    echo ERROR: Build failed!
    pause
    exit /b 1
)

echo.
echo [7/7] Starting Laravel server...
echo.
echo ========================================
echo   Application is starting...
echo ========================================
echo.
echo   Public Site: http://127.0.0.1:8000
echo   Admin Panel: http://127.0.0.1:8000/admin/login
echo.
echo   Admin Credentials:
echo   Email: ghulammustafa.bscsf22@iba-suk.edu.pk
echo   Password: ghulam786@
echo.
echo ========================================
echo   Press Ctrl+C to stop the server
echo ========================================
echo.

call php artisan serve

pause

