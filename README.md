# ecom
Laravel Inventory Project

# installation process
1. Clone this project.
````
git clone https://github.com/nasir23n/inventory.git
````
2. run composer command:
```
composer install
```
3. create database named ``inventory``
4. Copy `.env.example` to `.env`
```
cp .env.example .env
```
5. Import data to ``inventory`` database from ``inventory.sql`` file of the root directory.
5. Generate application key
```
php artisan key:generate
```
```
php artisan serve
```
visit on:
```
http://127.0.0.1:8000
```