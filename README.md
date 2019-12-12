# laravel_crm

A basic CRM made in php.

## Framework

Laravel

## Getting Started

Attention: These steps have been performed in a Windows environment. The installation steps may differ if you are using another operating system.

You can use containers or any other methods for the setup, but i'll only tell you how i've done it:

- First of all, install an Apache distribution containing MariaDB and PHP like [XAMPP](https://www.apachefriends.org/).
- Then install [Composer](https://getcomposer.org/) to manage dependencies. *Make sure to add composer to your Path environment variable.
- After installing Composer you must open a terminal and execute this command:

```
composer global require laravel/installer
```
- Create the project folder, name it 'crm' or whatever and add all the files. Open XAMPP and start the Apache server and the MySQL server. Now in your terminal go to the project folder and run:
```
php artisan migrate
```
```
php artisan serve
```
- And you're good to go! Just use this url to go to the website:
http://127.0.0.1:8000

After that you may have to add users manually. 
These are the credentials of the default admin user (if it exists in the database): 
E-Mail Address: administrador@mail.com
Password: 12345678

Note that you may face some problems in your installation. Just check that XAMPP is configured and installed correctly, add the corresponding route to your environment variable Path and make sure that the XAMPP's MySQL databse doesn't conflict with other  database management systems.

## Features overview

- Tasks management
- Campaigns management
- Role management (Create and update your own roles)
- Easy configurable settings
- Client overview (Keep easy track of open tasks for each client etc)
- Fast overview over your own open tasks, leads etc
- Global dashboard

## Credits to

- Creative Tim for this amazing template. https://www.creative-tim.com/product/paper-dashboard-2

### License

This project is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



