**InitDB**
-
Install InitDB:
~~~~
$ composer require javimanga/initdb
~~~~
Add line to config/app.php:
~~~~
JaviManga\InitDB\InitDBServiceProvider::class
~~~~
**Commands**
-
Create database with name of .env, if you pass parameter {seed} it will also insert the seeders:
~~~~
$ php artisan database:init {seed?}
~~~~
Create database, if no parameter {name} is passed it will create the database from the .env file:
~~~~
$ php artisan database:create {name?}
~~~~
Delete database, if no parameter {name} is passed it will delete the database from the .env file:
~~~~
$ php artisan database:drop {name?}
~~~~
Clone the database of the .env file with the name of the parameter {new_name}:
~~~~
$ php artisan database:clone {new_name?}
~~~~

