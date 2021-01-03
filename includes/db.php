<?php
    $username = "root";
    $password = ""; 
    $host = "127.0.0.1:3306";
    $db_name = "xchangeDB";
    $dsn = "mysql:host=" . $host . "; dbname=" . $db_name;

    try{
        $ConnectingDB = new PDO($dsn, $username, $password);
    }catch(PDOException $e){
        $errorMessage = $e->getMessage();
        exit();
    }

?>
