<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$username = 'root';
$password = 'root';

try{
    $conn = new PDO("mysql:unix_socket=$socket;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error ". $e->getMessage();
}

//create database if not exist
$sql = "CREATE DATABASE IF NOT EXISTS diputu";
try {
    $conn->query($sql);
    echo "Database created successfully";
} catch (PDOException $e) {
    echo "Error creating database: " . $conn->getMesage();
}

//use database
$sql = "USE diputu";
try {
    $conn->query($sql);
    echo "Now Using Database created";
} catch (PDOException $e) {
    echo "Error creating database: " . $conn->getMesage();
}

//create users table
$sql = "CREATE TABLE users (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(150) NOT NULL UNIQUE,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(150) NOT NULL,
    `email_notify` tinyint(1) DEFAULT 1,
    `verify` tinyint(1) DEFAULT 0, 
    `verify_token` varchar(175) NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
try {
    $conn->exec($sql);
    echo "Table userss created successfully";
} catch (PDOException $e) {
    echo "Error ". $e->getMessage();
}