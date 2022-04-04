# Product Code Generator

## General info
Online stores allow customers to choose multiple varieties for selected items, such as color and size.
This program generates code based on user input which includes item number and selected variety options.

## Technologies
Project is created with:
* PHP 7.4
* HTML5
* CSS / Bootstrap v5.1

## Setup
To run this project, install Composer:
```
$ composer install
```
To run PHPUnit Tests:
```
$ php vendor/bin/phpunit tests/ProductTest.php
$ php vendor/bin/phpunit tests/VarietyOptionTest.php

```


Packages & documentation: <br>
* [Nikic/Fast-route](https://github.com/nikic/FastRoute) - request router
* [Twig](https://twig.symfony.com/doc/3.x/) - template language for PHP
* [PHPUnit](https://phpunit.readthedocs.io/en/9.5/) - testing framework for PHP
