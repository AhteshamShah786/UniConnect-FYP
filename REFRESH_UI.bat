@echo off
echo ========================================
echo   Refreshing UI - Clearing Caches
echo ========================================
echo.

echo [1/4] Clearing application cache...
call php artisan cache:clear

echo [2/4] Clearing config cache...
call php artisan config:clear

echo [3/4] Clearing view cache...
call php artisan view:clear

echo [4/4] Rebuilding frontend assets...
call npm run build

echo.
echo ========================================
echo   UI Refresh Complete!
echo ========================================
echo.
echo   Next Steps:
echo   1. Hard refresh your browser (Ctrl + F5)
echo   2. Or clear browser cache
echo   3. Restart server: php artisan serve
echo.
echo ========================================
pause

