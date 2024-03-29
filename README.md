<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Ideas Project (Twitter Clone)
> This project is a simple Twitter clone application developed using Laravel.


---
## Getting started

### Required Php & Laravel

- Php : 8.1
- Laravel Framework : 10

### Installation
> Make sure you have installed the required Php and Laravel versions.


1 . Clone the repository
```
git clone git@github.com:DEVR4N/ideas-project.git
```

2 . Switch to the repository folder
```
cd ideas-project-main
```

3 . Install `Composer` dependencies.
```
composer install
```

4 . Copy `.env.example` file and create dublicate. 
```
cp .env.example .env
```

5 . Generate a new application key
```
php artisan key:generate
```

6 . The following code will create the necessary tables.
```
php artisan migrate
```

---
> Note : If you want to create Admin and User by default `php artisan db:seed`
---

7 . To start the localhost server, use the following command.
```
php artisan serve
```

8 . Access the server on http://localhost:8000 .


## Code Principles
- **Authorization** : Admin and user authorisations are separated in a simple way.

- **View** : Some components are collected in `views/shared` in order not to repeat the pages.
 
- **Localization** : A small localization structure has been built to improve the language structure.

- **Bootstrap** : Bootsrap 5 and Bootswatch were used to enhance the design.



