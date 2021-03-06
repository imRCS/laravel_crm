# laravel_crm

A basic CRM made in php.

## Framework

Laravel

## Getting Started

Attention: These steps have been performed in a Windows environment. The installation steps may differ if you are using another operating system.

You can use containers or any other methods for the setup, but i'll only tell you how i've done it:

- First, install an Apache distribution containing MariaDB and PHP like [XAMPP](https://www.apachefriends.org/). Configure your database according to this configuration:
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crmdb
DB_USERNAME=root
DB_PASSWORD=
 
- Then install [Composer](https://getcomposer.org/) to manage dependencies. *Make sure to add composer to your Path environment variable.
- After installing Composer you must open a terminal and execute this command:

```
composer global require laravel/installer
```
- Go to /htdocs inside XAMPP installation folder. 
- Create the project folder, name it 'crm' or whatever and add all the files. Open XAMPP and start the Apache server and the MySQL server. Go to http://localhost/phpmyadmin/, create a database with the name 'crmdb' and import the file crmdb.sql. Now in your terminal go to the project folder and run:
```
php artisan migrate
```
```
php artisan serve
```
- And you're good to go! Just use this url to go to the website:
http://127.0.0.1:8000

After that, you can register new users or login to the website with these user accounts:

Credentials of the default admin user: 
E-Mail Address: administrador@mail.com
Password: 12345678

Credentials of the default normal users: 
E-Mail Address: ana@mail.com or pepe@mail.com
Password: 12345678

Note that you may face some problems in your installation. Just check that XAMPP is configured and installed correctly, add the corresponding route to your environment variable Path and make sure that the XAMPP's MySQL databse doesn't conflict with other  database management systems.

## Features overview

- Products management
- Campaigns management
- Role management (Create and update your own roles)
- Completely functional dashboard
- Sales and income overview (Keep an easy record of each client's earnings,see the best selling products,etc)
- Complete store webpage prototype.
- Register new products, product visits and sales.

## Credits to

- Creative Tim for this amazing template. https://www.creative-tim.com/product/paper-dashboard-2

### License

This project is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



