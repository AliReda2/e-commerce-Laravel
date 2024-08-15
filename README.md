First install Composer
(start XAMPP apache and mysql) =>
Second go to cmd
in cmd write: 
composer require laravel/breeze --dev 
php artisan breeze:install
php artisan migrate
npm install
npm run build
php artisan make:controller HomeController
php artisan make:middleware Admin
php artisan make:controller AdminController
php artisan make:model Category -m
php artisan migrate
npm install toastr
composer require php-flasher/flasher-toastr-laravel
composer require php-flasher/flasher-toastr-symfony

if errors occur for toastr go to toaster|phpFlasher website
if errors occur for sweet alert go to sweetalert website

finally just replace the folders in the new laravel project with the folders in this repository 
