<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$severname = 'localhost';
$username = 'root';
$password = 'coding01';
$dbname = 'camagru';

try{
    $conn = new PDO("mysql:host=$severname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error ". $e->getMessage();
}

//create database if not exist
$sql = "CREATE DATABASE IF NOT EXISTS camagru";
try {
    $conn->query($sql);
    echo "Database created successfully";
} catch (PDOException $e) {
    echo "Error creating database: " . $conn->getMesage();
}

//use database
$sql = "USE camagru";
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

//create tables for images
$images = "CREATE TABLE IF NOT EXISTS images ("
. "id int NOT NULL AUTO_INCREMENT,"
. "imgName varchar(100) NOT NULL,"
. "imgId varchar(100) NOT NULL UNIQUE,"
. "userId varchar(100) NOT NULL,"
. "likes int NOT NULL DEFAULT 0,"
. "dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,"
. "PRIMARY KEY (id));";
try {
    $conn->exec($images);
    echo "Images table created successfully <br>";
} catch (PDOException $e) {
    echo "error: " . $images . "<br>" . $e->getMessage();
}

//create tables for images
$comments = "CREATE TABLE IF NOT EXISTS comments ("
. "id int NOT NULL AUTO_INCREMENT,"
. "imgId varchar(100) NOT NULL,"
. "userId varchar(100) NOT NULL,"
. "comment text NOT NULL,"
. "dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,"
. "PRIMARY KEY (id));";
try {
    $conn->exec($comments);
    echo "Comments table created successfully <br>";
} catch (PDOException $e) {
    echo "error: " . $comments . "<br>" . $e->getMessage();
}

//create tables for images
$pwdreset = "CREATE TABLE IF NOT EXISTS pwdreset ("
. "id int NOT NULL AUTO_INCREMENT,"
. "email varchar(100) NOT NULL,"
. "token varchar(100) NOT NULL,"
. "verify tinyint(1) DEFAULT 0,"
. "dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,"
. "PRIMARY KEY (id));";
try {
    $conn->exec($pwdreset);
    echo "Password reset table created successfully <br>";
} catch (PDOException $e) {
    echo "error: " . $pwdreset . "<br>" . $e->getMessage();
}
$conn = null;