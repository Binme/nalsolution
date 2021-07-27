# Nal SOLUTION

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Nal is a web system CRUD for working plan

## Features

1. Functions to Add, Edit, Delete Work. A work includes information of “Work Name”, “Starting
Date”, “Ending Date” and “Status” (Planning, Doing, Complete)
2. Function to show the works on a calendar view with: Date, Week, Month (can use third-party
library)

## Tech

Nal uses a number of open source projects to work properly:

- [JS]
- [PHP]
- [SQL - Mysql]
- [PHPUnit] 

## Requirement
Nal requires PHP/Apache2, Mysql to run.
## Installation

STEP 1:
Import file `nal.sql` to mysql

STEP 2:
Install application.
```sh
git clone https://github.com/Binme/nalsolution.git
```
STEP 3:
Configure db connection to start the application.
```sh
cd nalsolution/modal
```
Open file `Work.php` in apache2 webserver
Config variable `$servername`,`$username`,`$password`,`$dbname`
```sh
function __construct() {
    $servername = "127.0.0.1";
    $username = "dane";
    $password = "dane";
    $dbname = "nal";
    // Create connection
    $conn = new \mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $this->conn = $conn;
}
```
STEP 4:
```sh
cd ../controller
```
Open file `Handler.php` in apache2 webserver
Everything will start

## Unit Test
Run file unit test from base folder project
```sh
cd ../
./vendor/bin/phpunit tests/WorkTest.php
```
