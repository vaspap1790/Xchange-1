# xchange
Webapp for exchanging items - for Masters Coursework 

Put the name of the folder of your  folder instead of Xchange for the next instructions:

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


_Mail Configuration_

Go to 'xampp/php/php.ini' file and set these parameters:

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = xchangedve@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

xampp/sendmail/sendmail.ini

smtp_server=smtp.gmail.com
smtp_port=587
smtp_ssl=tls
auth_username= xchangedve@gmail.com
auth_password= Findwhatevertheweather

You can check in xchangedve@gmail.com with password:Findwhatevertheweather 
that the mail has benn sent

