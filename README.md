# Project Starter Laravel 8 and Ajax with user permission and Multiguard auth

This is a simple project starter build using laravel 8 ,ajax and as an template used Admin lte 3.

### How Install

You can simply run the project by following process
```shell
$ git clone ######################
```
```shell
$ cd laravel-ajax-project-starter
```
```shell
$ composer install
```
```shell
$ rename the .env.example to .env
```
```shell
$ php artisan key:generate
```
```shell
$ fill up you database information
```
```shell
$ import data base from sql/laravel_starter.sql in ypur php myadmin
```
```shell
$ php artisan serve
```

Multi guard auth:

For admin login visit
```shell
url/admin-login
```

For user login visit
```shell
url/users-login
```

For customer unader user login visit
```shell
url/customerusers-login
```

Screenshot:
![image](1.PNG?raw=true "image")

![image](2.PNG?raw=true "image")

![image](3.PNG?raw=true "image")

![image](4.PNG?raw=true "image")

For adding new user permission

go to views/backend/user/addpermission.blade.php and add new table col and add new module id in mark section
![image](5.PNG?raw=true "image")

then you can prevent user to access the route by using checkpermission in you controller
![image](6.PNG?raw=true "image")

Also you can give permission in you database by you comma Ex: if user module permission = 1 and category module permission = 2 
so the user_permission field in user table should have 1,2 value.if you have only category permission then remove 1 so the 
user_permission field will be 2 .
![image](7.PNG?raw=true "image")

### <a href="#">LIVE DEMO</a>




