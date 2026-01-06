@echo off
echo ============================
echo   500 Error Fix Helper
echo ============================

:: --- EDIT THESE PATHS IF NEEDED ---
set SERVICE_NAME=Apache2.4
set PROJECT_DIR=C:\htdocs\myproject
set PHP_INI=C:\php\php.ini
:: ----------------------------------

echo.
echo Stopping Apache...
net stop %SERVICE_NAME%

echo.
echo Backing up .htaccess (if exists)...
if exist "%PROJECT_DIR%\.htaccess" (
    rename "%PROJECT_DIR%\.htaccess" .htaccess.bak
    echo .htaccess renamed to .htaccess.bak
) else (
    echo No .htaccess file found
)

echo.
echo Creating test.php (phpinfo)...
echo ^<?php phpinfo(); ^?> > "%PROJECT_DIR%\test.php"

echo.
echo Enabling PHP error display (appending to php.ini)...
echo display_errors = On>> "%PHP_INI%"
echo log_errors = On>> "%PHP_INI%"
echo error_reporting = E_ALL>> "%PHP_INI%"

echo.
echo Starting Apache...
net start %SERVICE_NAME%

echo.
echo Done!
echo Open in browser:
echo http://localhost/test.php
echo.
echo If site works, issue was in .htaccess or PHP script.
echo To restore .htaccess, rename .htaccess.bak back to .htaccess.
pause
