<?php

$host = '127.0.0.1:3307';
$dbname = 'OOP_DB';
$username = 'root';
$password = '';

class Connection{
  
  public static function make($host, $dbname, $username, $password){
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        // echo "Connected successfully";
        return new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    }
}

return Connection::make($host, $dbname, $username, $password);

