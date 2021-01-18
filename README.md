# xchange
Webapp for exchanging items - for Masters Coursework 

Backend Technologies : PHP, MySQL - XAMPP 
Frontend Technologies: Html, CSS, JQuery, Bootstrap

_Manual_

Put the name of the folder of your folder instead of Xchange for the next instructions:

_Error Handling_

Create a '.htaccess' file in your htdocs directory with this content:

ErrorDocument 404 /Xchange/error.php

ErrorDocument 403 /Xchange/error.php

ErrorDocument 500 /Xchange/error.php

_DataBase Configuration_

Create a database called 'xchangedb' in your phpMyAdmin 
Run the initialisation script that is on 'sql/db_script.sql' file 
on the SQl Command window of your database in phpMyAdmin
This script will also enter some dummy data
If you don't want dummy data you can run 'sql/db_script_no_dummy_data.sql'

In 'xampp/htdocs/Xchange/includes/db.php file
put your parameters for username,password, database(if you have different name) name and 
host(host and port that your db server is running - default for XAMPP is 127.0.0.1:3306) 
which you can configure in 'my.ini' file. 
You can access 'my.ini' file by pressing 'Config' in MySQL
in XAMPP Control Panel.


_Dummy Data_

Password for inserted users : 12345 (application)
Use vaspap1790 that has more dummy data
Categories that have dummy data: Books and Computer/Tables & Networking

_Mail Configuration_

Go to 'xampp/php/php.ini' file and set these parameters:

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = xchangedve@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

Then you have to set the following parameters in 'xampp/sendmail/sendmail.ini' file:

smtp_server=smtp.gmail.com
smtp_port=587
smtp_ssl=tls
auth_username= xchangedve@gmail.com
auth_password= Findwhatevertheweather

You can check in xchangedve@gmail.com with password:Findwhatevertheweather 
that the mail has benn sent and received

