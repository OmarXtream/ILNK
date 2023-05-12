<p align="center"><a href="https://ILNK.at/" target="_blank"><img src="https://f.top4top.io/p_26872zeys1.png"></a></p>
<p align="center">
ILNK Project<br>
</p>

# This project was bulid with Laravel Framework 10.4.1

## Server Requirements

The Laravel framework has a few [system requirements](https://laravel.com/docs/10.x/deployment#server-requirements), You should ensure that your web server has it.

## Installation

### Step 1

Install a multitude of software required for the project

```bash
composer install
```

### Step 2

Set the desired environment variables

```bash
cp .env.example .env
```

### Step 3

Set the APP_KEY value that used for encryption in the .env file.

```bash
php artisan key:generate
```

### Step 4

Create the database tables and seed them by running the migrations

###### Make sure you have set the database credentials in the .env file before this step

```bash
php artisan migrate --seed
```

### Step 5

Make storage files accessible from the web, by creating a symbolic link

```bash
php artisan storage:link
```



## Creating Admin user

Creating an administrator user using tinker.

### Step 1

```bash
php artisan tinker
```

### Step 2

Create a manager object

```php
$manager = new App\Models\Manager;
```

### Step 3

Set up the manager credentials

```php
$manager->username = "OmarXtream";
$manager->password = Hash::make("PASSWORD");
$manager->email = "o20171900@gmail.com";
```

Insert the manager in the database

```php
$manager->save();
```

To exit tinker just write

```bash
exit
```

# Database Structure
you can check it on [dbdiagram](https://dbdiagram.io/d/64308d338615191cfa8c43e4)

### Security

If you discover any security related issues, please email o20171900@gmail.com instead of using the issue tracker <br>
Or [Contact me](https://solo.to/omarxtream).

## Credits

-   [OmarXtream](https://github.com/OmarXtream)

