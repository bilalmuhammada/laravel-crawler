<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).


## PHP Product Crawler
Description
This PHP script crawls product data from:

🔗 https://sandbox.oxylabs.io/products

It extracts the following fields per product:

title

price

image_url

description (if available)

category or another classification field

The script outputs the collected data as JSON.

# Requirements
PHP 7.4 or higher

``` php crawler.php > products.json  ```


The JSON file products.json will contain the scraped product data.
# output
![image](https://github.com/user-attachments/assets/bb3df614-2449-48b5-b086-ae6d6e7d5da6)

# Configure Database
Set your database connection in .env:
 ``` DB_CONNECTION=mysql ```
 
 ``` DB_HOST=127.0.0.1 ```
 
  ```DB_PORT=3306 ```
  
 ``` DB_DATABASE=oyxlab ```
 
 ``` DB_USERNAME=root ```
 
 ``` DB_PASSWORD= ```
 
 ```QUEUE_CONNECTION=database ```

# Command
``` php artisan migrate ```

``` php artisan queue:work ```

# import data in data base
![prod tbale](https://github.com/user-attachments/assets/bafad2ae-2fea-4fc6-bd7c-192eea47be3a)
![imag table](https://github.com/user-attachments/assets/5a32cdc9-b2be-4c30-a599-056780f2eb0c)

# Filament Admin Panel

 ``` composer require filament/filament:"^3.0"  ```

 ``` php artisan filament:install  ```
 
 ```  php artisan make:filament-user ```


![pro2](https://github.com/user-attachments/assets/8b8dbdc9-3b92-4ebc-b351-8e2b214aec2d)
![pro1](https://github.com/user-attachments/assets/3aa31946-97e2-43ad-9410-9453b9f3c271)
![login](https://github.com/user-attachments/assets/a7abf0be-286b-495c-9d47-fed1a405714d)
![edit](https://github.com/user-attachments/assets/6ed76e50-f544-4cbe-8b33-8c75552cfdac)
![dashb](https://github.com/user-attachments/assets/7680a55a-6b4d-4587-ba85-71edc36ef4fb)

# Dynamic Frontend – Livewire + AlpineJS

``` composer require livewire/livewire ```

``` npm install -D tailwindcss postcss autoprefixer vite laravel-vite-plugin  ```

![image](https://github.com/user-attachments/assets/118a2e31-414a-4256-8d2f-b91e8a32dc6a)



# database inside public folder

``` php artisan serve ```

``` npm run dev ```


