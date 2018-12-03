<?php 

// $socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$servername = 'localhost';
$username = 'root';
$password = 'coding01';
$dbname = 'camagru';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error ". $e->getMessage();
}