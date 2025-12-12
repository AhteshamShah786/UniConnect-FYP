@echo off
REM UniConnect Route Testing Script
REM This script helps you test all the critical routes

color 0A
cls

echo.
echo ========================================
echo   UniConnect Route Testing
echo ========================================
echo.
echo Starting Laravel development server...
echo.

REM Navigate to project
cd /d "%~dp0"

REM Start Laravel server in background
start php artisan serve

REM Wait for server to start
timeout /t 3

echo.
echo ========================================
echo   CRITICAL ROUTES TO TEST
echo ========================================
echo.
echo [FIXED ISSUES]
echo 1. Scholarship Eligibility Check:
echo    http://127.0.0.1:8000/scholarships/eligibility-check
echo    Expected: Form loads (NO 404 error)
echo.
echo 2. Networking Create Community:
echo    http://127.0.0.1:8000/networking/create
echo    Expected: Redirects to login (NO 404 error)
echo    After login: Create post form loads
echo.
echo [OTHER IMPORTANT ROUTES]
echo 3. Scholarships List:
echo    http://127.0.0.1:8000/scholarships
echo.
echo 4. Networking Feed:
echo    http://127.0.0.1:8000/networking
echo.
echo 5. Universities List:
echo    http://127.0.0.1:8000/universities
echo.
echo 6. Home Page:
echo    http://127.0.0.1:8000/
echo.
echo ========================================
echo   ROUTE VERIFICATION
echo ========================================
echo.
echo Running: php artisan route:list
echo.

php artisan route:list

pause
