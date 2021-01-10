# xchange
Webapp for exchanging items - for Masters Coursework 

Put the name of the folder of your project instead of Xchange for the next instructions

_Error Handling_

Create a '.htaccess' file in your htdocs directory with this content:

ErrorDocument 404 /Xchange/error.php

ErrorDocument 403 /Xchange/error.php

ErrorDocument 500 /Xchange/error.php

_DataBase Configuration_

Create a database
Run the initialisation script that is on 'db_script.sql' file 
on the SQl Command window of your database in phpMyAdmin

In 'xampp/htdocs/Xchange/includes/db.php file
put your parameters for username,password, data base name and 
host(host and port that your db server is running - default 127.0.0.1:3306) 
which you can configure in my.ini file which you can access by pressing 'Config' in MySQL
in XAMPP Control Panel.

Password for existing users : 12345 (application)
Better use vaspap1790 that has more dummy data.
