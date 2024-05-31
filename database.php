<?php
// database.php
$pdo = require 'connect.php';

$statements = [
    'CREATE TABLE IF NOT EXISTS AdminUsers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL
    );',
    'CREATE TABLE IF NOT EXISTS Customers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL,
        city VARCHAR(50),
        state VARCHAR(50),
        country VARCHAR(50)
    );',
    "INSERT INTO AdminUsers (id, firstname, lastname, email, username) VALUES 
        (1, 'John', 'Doe', 'JDoe1@gmail.com', 'JDoe1'),
        (2, 'Jane', 'Smith', 'JSmith@gmail.com', 'JSmith'),
        (3, 'Alice', 'Johnson', 'AJohnson@gmail.com', 'AJohnson')
    ON DUPLICATE KEY UPDATE id=id;",  // Prevent duplicate insertion
    "INSERT INTO Customers (id, firstname, lastname, email, username, city, state, country) VALUES 
        (1, 'John', 'Doe', 'JDoe2@gmail.com', 'JDoe2', 'New York', 'NY', 'USA'),
        (2, 'Emily', 'Brown', 'EBrown@gmail.com', 'EBrown', 'Los Angeles', 'CA', 'USA'),
        (3, 'Michael', 'White', 'MWhite@gmail.com', 'MWhite', 'Chicago', 'IL', 'USA')
    ON DUPLICATE KEY UPDATE id=id;"  // Prevent duplicate insertion
];

foreach ($statements as $statement) {
    try {
        $pdo->exec($statement);
    } catch (PDOException $e) {
        echo 'Error executing statement: ' . $e->getMessage();
    }
}

