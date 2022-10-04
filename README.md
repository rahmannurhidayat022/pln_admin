<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requirment

- Install XAMPP (PHP >8)
- Install Text Editor (Visual Studio Code/Sublime Text/Notepade++, Etc)
- Install Composer Version Update *https://getcomposer.org/*

## How to Install pln_admin

- clone code/or download github *https://github.com/rahmannurhidayat022/pln_admin.git*
- composer install --ignore-platform-reqs
- create database pln in _http://localhost/phpmyadmin/_
- create file .env in folder pln_admin
- input name database _DB_DATABASE=pln_ in file .env
- write _php artisan key:generate_ in terminal (folder pln_admin)
- write _php artisan migrate_ in terminal (folder pln_admin)
- write _php artisan db:seed_ in terminal (folder pln_admin)
- write _php artisan serve_ in terminal (folder pln_admin)
- open browser and input link _localhost:8000_]
- login with email: admin@pln.com pass:admin123
- Done !!!
