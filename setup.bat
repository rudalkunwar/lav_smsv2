@echo off
echo ================================================
echo Laravel SMS Project - Quick Setup Script
echo ================================================
echo.

echo Step 1: Installing Composer Dependencies...
call composer install
if errorlevel 1 (
    echo ERROR: Composer installation failed!
    pause
    exit /b 1
)
echo.

echo Step 2: Setting up environment file...
if not exist .env (
    copy .env.example .env
    echo .env file created from .env.example
) else (
    echo .env file already exists
)
echo.

echo Step 3: Generating application key...
call php artisan key:generate
echo.

echo Step 4: Running composer dump-autoload...
call composer dump-autoload
echo.

echo ================================================
echo SETUP INSTRUCTIONS
echo ================================================
echo.
echo 1. Edit the .env file and configure your database:
echo    - DB_DATABASE=your_database_name
echo    - DB_USERNAME=your_database_user
echo    - DB_PASSWORD=your_database_password
echo.
echo 2. After configuring the database, run:
echo    - php artisan migrate
echo    - php artisan db:seed (if you have seeders)
echo.
echo 3. Install Node dependencies and build assets:
echo    - npm install
echo    - npm run build (or npm run dev for development)
echo.
echo 4. Create storage link:
echo    - php artisan storage:link
echo.
echo 5. Start the development server:
echo    - php artisan serve
echo.
echo ================================================
echo Setup partially complete!
echo Please follow the instructions above to finish.
echo ================================================
pause
