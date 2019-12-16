## About LPUIID

Laravel Passport UIID Template is a laravel template with passport authentication and random strings for ID instead or incrementing numbers.

## Installation

-   Run this in your cmd folder path in htdocs: git clone https://github.com/sydummy/lpuiid-dev.git
-   In cmd, go to the folder "lpuiid-dev", run **composer update**
-   Copy .env.example and save as .env
-   Generate app key by running **php artisan key:generate**
-   Create database name "lpuiid-dev" in your localhost PHPMyAdmin
-   In cmd, enter **php artisan migrate** for the database
-   In cmd, enter **php artisan passport:install** to create personal client token
-   Next, enter **php artisan serve** to run in localhost
-   In web browser, go to localhost:8000/clients

## Modified Files
"# laravel-query-crud" 
