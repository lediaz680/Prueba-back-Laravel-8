<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
 -->
composer install 

npm install 

 php artisan key:generate

cambiar el archivo .env.example por .env

en el archivo .env cambiar el nombre de la base de datos 
DB_DATABASE=companies_employes


configurar mailtrap en .env , debe quedar asi: 
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=2b8fe580053467
MAIL_PASSWORD=b506347fbb1dba
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=correoEnviaPrueba@gmai.com
MAIL_FROM_NAME="${APP_NAME}"
realizar las migraciones con los seeders

crear la base de datos en mysql 

php artisan migrate
## DESCARGA DEL PROYECTO

## CREAR LA BASE DE DATOS EN 

## CONFIGURACION BASE DE DATOS .ENV
El NOMBRE DE LA BASE DE DATOS companies_employes

## EN DATABASE SEEDERS EN RUN SE CREA EL PRIMER USUARIO AL MOMENTO DE MIGRAR
Este usuario es admin@admin.com con contraseña password

## REALIZAR LA MIGRACION CON EL SEEDER PARA CREAR REGISTROS CON FAKER DE COMPANIES Y EMPLOYES
php artisan migrate --seed 
## EN CASO DE MIGRAR SIN LOS SEEDERS
php aritsan migrate:fresh --seed


## EL PROYECTO ESTA CONFIGURADO PARA MULTI-LENGUAGE
